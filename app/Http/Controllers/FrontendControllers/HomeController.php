<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
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
}
