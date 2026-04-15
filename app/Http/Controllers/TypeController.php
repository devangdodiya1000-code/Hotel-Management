<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function get() {
        $types = Type::get();

        $html = view('get_ajax_type_list', compact('types'))->render();

        return response()->json([
            'status' => 1,
            'message' => "get types successfully.",
            'html' => $html,
        ]);
    }

    public function store(Request $request) {

        $type = $request->all();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'file' => 'required|image|max:10240', // 10MB limit
            'status' => 'nullable|integer'
        ]);

        $file_name = null;

        if($request->hasFile('file') && $request->file('file')->isValid()){
            $file = $request->file('file');

            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $path = public_path('uploads');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $file_name);
        }

        $validated['image'] = $file_name;

        if(empty($type['type_id'])) {
            $type = Type::create($validated);
        }else {
            $type = Type::findOrFail($type['type_id']);
            $type->update($validated);
        }

        return response()->json([
            'status'  => 1,
            'message' => 'Type successfully stored',
        ]);
    }

    public function edit($id)
    {
        $type = Type::find($id);

        return response()->json($type);
    }

    public function destroy($id) {
        $type = Type::find($id);

        $type->delete();

        return response()->json([
            'status' => 1,
            'message' => "Type deleted successfully.",
        ]);
    }

    public function view($id) {
        $type = Type::find($id);

        $html = view('get_ajax_type_view_modal', compact('type'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Type view successfylly.",
            'html' => $html,
        ]);
    }
}



