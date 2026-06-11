<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index() {
        $title = "Testing page";

        return view('tests/index', compact('title'));
    }

    public function get() {
        $tests = Test::orderBy('id', 'desc')->get();

        $html = view('tests/ajax_get_test_table_data', compact('tests'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'data render successfully.',
            'html' => $html,
        ]);
    }

    public function create() {
        $title = "Add test modal";

        $html = view('tests/ajax_create_test_modal', compact('title'))->render();

        return response()->json([
            'status' => 1,
            'html' => $html,
            'message' => 'create test moda open successfully.',
        ]);
    }

    public function edit($id) {
        $title = "Edit Test ";

        $test = Test::find($id);

        $html = view('tests/ajax_create_test_modal', compact('title', 'test'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Edit modal open successfully.",
            'html' => $html,
        ]);
    }

    public function store(Request $request) {
        $tests = $request->all();
        $test_id = $request->test_id;

        $tests = $request->validate([
            'name' => 'required|string|max:255',
            'image' => ($test_id ? 'nullable' : 'required'). '|image|mimes:jpg,jpeg,png|max:10240',
            'description' => 'required',
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

            $tests['image'] = $file_name;
        }

        $tests['status'] = 1;

        if(!empty($test_id)) {
            $testsData = Test::findOrFail($test_id);
            $testsData->update($tests);
        }else {
            $testsData = Test::create($tests);
        }

        return response()->json([
            'status' => 1,
            'message' => "tests store successfully.",
        ]);
    }

    public function destroy($id) {
        $test = Test::find($id);

        $test->delete();

        return response()->json([
            'message' => 'Test delete successfully.',
            'statua' => 1,
        ]);
    }

    public function view($id) {
        $test = Test::find($id);

        $html = view('tests.ajax_get_test_view_page', compact('test'))->render();

        return response()->json([
            'message' => 'View show successfully.',
            'html' => $html,
            'status' => 1,
        ]);
    }
}
