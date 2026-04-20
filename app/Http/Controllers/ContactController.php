<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $title = "Contacts";

        return view('contacts/contacts', compact('title'));
    }

    public function get() {
        $contacts = Contact::get();

        $html = view('contacts/ajax_get_contact_list', compact('contacts'))->render();

        return response()->json([
            'status' => 1,
            'message' => "contact list render successfully.",
            'html' => $html,
        ]);
    }

    public function create() {
        $title = "Add Contact";
        $contact = null;

        $html = view('contacts/ajax_get_add_contact_modal', compact('title', 'contact'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Open add contact modal',
            'html' => $html,
        ]);
    }

    public function edit($id) {
        $title = "Edit Contact";
        $contact = Contact::find($id);

        $html = view('contacts/ajax_get_add_contact_modal', compact('title', 'contact'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Contact edit',
            'html' => $html,
        ]);
    }

    public function store(Request $request) {

        $contact_id = $request->contact_id;

        $contact = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required',
            'message' => 'required',
        ]);

        if($contact_id) {
            $contactData = Contact::find($contact_id);
            $contactData->update($contact);
        }else{
            $contactData = Contact::create($contact);
        }

        return response()->json([
            'status' => 1,
            'message' => "Contact store successfully",
        ]);
    }

    public function destroy($id) {
        $contact = Contact::find($id);

        $contact->delete();

        return response()->json([
            'status' => 1,
            'message' => "Contact delete successfully",
        ]);
    }

    public function view($id) {
        $contact = Contact::find($id);
        $title = "View Contact";

        $html = view('contacts/ajax_get_view_contact_modal', compact('title', 'contact'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Contact view successfully.',
            'html' => $html,
        ]);
    }
}
