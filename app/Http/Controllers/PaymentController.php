<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Store a new payment
    public function store(Request $request)
    {
        $payment = Payment::create($request->all());
        return response()->json($payment, 201);
    }

    // Update an existing payment
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return response()->json($payment, 200);
    }

    // Delete a payment
    public function destroy($id)
    {
        Payment::destroy($id);
        return response()->json(null, 204);
    }

    // Get all payments
    public function index()
    {
        $payments = Payment::all();
        return response()->json($payments, 200);
    }

    // Get a specific payment by ID
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json($payment, 200);
    }

    // Get payments by email
    public function getByEmail($email)
    {
        $payments = Payment::where('email', $email)->get();
        return response()->json($payments, 200);
    }

    // Get payments by status
    public function getByStatus($status)
    {
        $payments = Payment::where('status', $status)->get();
        return response()->json($payments, 200);
    }
}