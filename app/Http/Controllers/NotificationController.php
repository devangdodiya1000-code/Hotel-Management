<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Type;
use App\Models\Subtype;
use App\Models\Room;

class NotificationController extends Controller
{
    public function index() {
        $title = "Notifications";

        return view('notifications/index', compact('title'));
    }

    public function get() {
        $notifications = Notification::with('type', 'subtype', 'room')->where('status', 1)->get();

        $html = view('notifications/get_ajax_notifications_list', compact('notifications'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Notifications data get successfully.',
            'html' => $html,
        ]);
    }

    public function create() {
        $title = "Add Notification";
        
        $types = Type::where('status', 1)->get();
        $subtypes = Subtype::where('status', 1)->get();
        $rooms = Room::where('status', 1)->get();
        $notification = null;

        $html = view('notifications/get_ajax_add_notification_modal', compact('title', 'notification', 'types', 'subtypes', 'rooms'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Notifications get successfully.',
            'html' => $html,
        ]);
    }

    public function edit($id) {
        $title = "Edit Notification";
        $notification = Notification::find($id);
        $types = Type::where('status', 1)->get();
        $subtypes = Subtype::where('status', 1)->get();
        $rooms = Room::where('status', 1)->get();

        $html = view('notifications/get_ajax_add_notification_modal', compact('title', 'notification', 'types', 'subtypes', 'rooms'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Modal show successfully",
            'html' => $html,
        ]);
    }

    public function store(Request $request){
        $notification = $request->all();
        $notification_id = $request->notification_id;

        $notification = $request->validate([
            'name' => 'required|string|max:255',
            'image' => ($notification_id ? 'nullable' : 'required'). '|image|mimes:jpg,jpeg,png|max:5120',
            'type_id' => 'required|integer',
            'subtype_id' => 'required|integer',
            'room_id' => 'required|integer',
            'status' => 'nullable|integer',
        ]);

        if($request->hasFile('image') && $request->file('image')){
            $file = $request->file('image');

            $file_name = time(). '.' . $file->getClientOriginalExtension();

            $path = public_path('uploads');

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }

            $file->move($path, $file_name);

            $notification['image'] = $file_name;
        }

        if($notification_id) {
            $updateData = Notification::find($notification_id);
            $updateData->update($notification);
        }else {
            $addNotification = Notification::create($notification);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Notifications added successfully',
        ]);
    }

    public function destroy($id) {
        $notification = Notification::find($id);

        $notification->delete();

        return response()->json([
            'status' => 1,
            'message' => "Notification delete successfully",
        ]);
    }

    public function view($id) {
        $title = "View Notification";

        $notification = Notification::with('type', 'subtype', 'room')->where('id', $id)->first();

        $html = view('notifications/get_ajax_view_notification_modal', compact('title', 'notification'))->render();

        return response()->json([
            'status' => 1,
            'message' => "View modal render successfully.",
            'html' => $html,
        ]);
    }
}
