<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Type;
use App\Models\Subtype;

class RoomController extends Controller
{
    public function index() {
        $title = "Hotel Rooms";
        $types = Type::where('status', 1)->get();
        $subtypes = Subtype::where('status', 1)->get();

        return view('rooms/index', compact('title', 'types', 'subtypes'));
    }

    public function get(Request $request) {
        $query = Room::with('type','subtype')->where('status', 1);

        if($request->name){
            $query->where('name', 'LIKE', '%'. $request->name . '%');
        }

        if($request->type) {
            $query->where('type_id', 'LIKE', '%'. $request->type . '%');
        }

        if($request->subtype) {
            $query->where('subtype_id', 'LIKE', '%'. $request->subtype . '%');
        }

        $rooms = $query->get();

        $html = view('rooms/get_ajax_rooms_list', compact('rooms'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Rooms get successfully.",
            'html' => $html,
        ]);
    }

    public function create() {
        $title = "Add Room Modal";
        $types = Type::where('status', 1)->get();
        $subtypes = Subtype::where('status', 1)->get();
        $room = null;

        $html = view('rooms/get_ajax_add_room_modal', compact('title', 'room', 'types', 'subtypes'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Add Modal get successfully.",
            'html' => $html,
        ]);
    }

    public function edit($id) {
        $title = "Edit Room Modal";
        $room = Room::findOrFail($id);
        $types = Type::where('status', 1)->get();
        $subtypes = Subtype::where('status', 1)->get();

        $html = view('rooms/get_ajax_add_room_modal', compact('title', 'room', 'types', 'subtypes'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Edit modal open successfully.",
            'html' => $html,
        ]);
    }

    public function store(Request $request) {

        $room = $request->all();
        $room_id = $request->room_id;

        $room = $request->validate([
            'name' => 'required|string|max:255',
            'image' => ($room_id ? 'nullable' : 'required'). '|image|mimes:jpg,jpeg,png|max:5120',
            'type_id' => 'required|integer',
            'subtype_id' => 'required|integer',
            'status' => 'nullable|integer',
            'price' => 'required|numeric',
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $file = $request->file('image');

            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $path = public_path('uploads');

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }

            $file->move($path, $file_name);

            $room['image'] = $file_name;
        }

        if($room_id) {
            $updateData = Room::findOrFail($room_id);
            $updateData->update($room);
        }else{
            $addRoom = Room::create($room);
        }

        return response()->json([
            'status' => 1,
            'message' => "Room store successfully",
        ]);
    }

    public function destroy($id) {
        $room = Room::find($id);

        $room->delete();

        return response()->json([
            'status' => 1,
            'message' => "Room delete successfully.",
        ]);
    }

    public function view($id){
        $title = "View Room";
        $room = Room::with('type', 'subtype')->where('id', $id)->first();

        $html = view('rooms/get_ajax_view_room_modal', compact('room', 'title'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Room view successfully.',
            'html' => $html,
        ]);
    }

    public function book($id) {
        $room = Room::find($id);

        return view('rooms/room_details', compact('room'));
    }
}

