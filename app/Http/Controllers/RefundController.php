<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refund;
use App\Models\Payment;

class RefundController extends Controller
{
    // Store a new refund
    public function store(Request $request, $payment_id)
    {
        $payment = Payment::findOrFail($payment_id);
        $refund = new Refund($request->all());
        $refund->payment_id = $payment->id;
        $refund->save();

        return response()->json($refund, 201);
    }

    // Update an existing refund
    public function update(Request $request, $id)
    {
        $refund = Refund::findOrFail($id);
        $refund->update($request->all());
        return response()->json($refund, 200);
    }

    // Delete a refund
    public function destroy($id)
    {
        Refund::destroy($id);
        return response()->json(null, 204);
    }
}