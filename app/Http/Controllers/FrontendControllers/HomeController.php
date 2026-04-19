<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function get_rooms(Request $request) {

        $query = Room::where('status', 1);

        if($request->type) {
            $query->where('type_id', 'LIKE', '%'. $request->type . '%');
        }

        $rooms = $query->get();

        $html = view('frontend/ajax_get_rooms_list', compact('rooms'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Get rooms successfully.",
            'html' => $html,
        ]);
    }

    public function contactStore(Request $request) {
        // $contactData = $request->all();

        $contactData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $saveData = Contact::create($contactData);

        return response()->json([
            'status' => 1,
            'message' => "Contact form save successfully.",
        ]);
    }
}
