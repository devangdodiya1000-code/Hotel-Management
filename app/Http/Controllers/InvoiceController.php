<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class InvoiceController extends Controller
{
    public function index() {
        $title = "Invoice";

        return view('rooms/invoice', compact('title'));
    }

    public function get() {
        $invoiceData = Booking::with('room')->orderBy('id', 'desc')->get();

        $html = view('rooms/ajax_get_invoice_data', compact('invoiceData'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'invoice data render successfully.',
            'html' => $html,
        ]);
    }
}
