<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Subtype;

class SubtypeController extends Controller
{
    public function index()
    {
        return view('subtype.index');
    }

    public function get() {

        $subtypes = Subtype::with('type')->get();

        $html = view('subtype/get_ajax_subtype_list', compact('subtypes'))->render();

        return response()->json([
            'status' => 1,
            'message' => "list render successfully",
            'html' => $html,
        ]);
    }

    public function create() {
        $title = "Add Sub Type";
        $types = Type::where('status', 1)->get();
        $subtype = null;

        $html = view('subtype/get_ajax_add_subtype_modal', compact('title', 'types', 'subtype'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'modal open successfully.',
            'html' => $html,
        ]);
    }

    public function edit($id) {
        $title = "Edit Sub Type ";
        $types = Type::where('status', 1)->get();

        $subtype = Subtype::find($id);

        $html = view('subtype/get_ajax_add_subtype_modal', compact('title', 'types', 'subtype'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Edit modal open successfully.",
            'html' => $html,
        ]);
    }

    public function store(Request $request) {
        $subtypes = $request->all();
        $subtype_id = $request->subtype_id;

        $subtypes = $request->validate([
            'name' => 'required|string|max:255',
            'image' => ($subtype_id ? 'nullable' : 'required'). '|image|mimes:jpg,jpeg,png|max:10240',
            'type_id' => 'required',
            'status' => 'nullable|integer',
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $file = $request->file('image');

            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $path = public_path('uploads');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $file_name);

            $subtypes['image'] = $file_name;
        }

        if(!empty($subtype_id)) {
            $subtypeData = Subtype::findOrFail($subtype_id);
            $subtypeData->update($subtypes);
        }else {
            $subtypeData = Subtype::create($subtypes);
        }

        return response()->json([
            'status' => 1,
            'message' => "Subtype store successfully.",
        ]);
    }

    public function destroy($id)
    {
        $subtype = Subtype::find($id);

        $subtype->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Subtype delete successfully.',
        ]);
    }

    public function view($id) {
        $title = "Subtype View Modal";

        $subtype = Subtype::with('type')->where('id', $id)->first();

        $html = view('get_ajax_subtype_view_modal', compact('subtype', 'title'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Subtype data view successfully.",
            'html' => $html,
        ]);
    }
}
