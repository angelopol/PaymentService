<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gateway;

class GatewayController extends Controller
{
    // Get all gateways
    public function index()
    {
        $gateways = Gateway::all();
        return response()->json($gateways, 200);
    }

    // Get a specific gateway by ID
    public function show($id)
    {
        $gateway = Gateway::findOrFail($id);
        return response()->json($gateway, 200);
    }

    // Store a new gateway
    public function store(Request $request)
    {
        $gateway = Gateway::create($request->all());
        return response()->json($gateway, 201);
    }

    // Update an existing gateway
    public function update(Request $request, $id)
    {
        $gateway = Gateway::findOrFail($id);
        $gateway->update($request->all());
        return response()->json($gateway, 200);
    }

    // Delete a gateway
    public function destroy($id)
    {
        Gateway::destroy($id);
        return response()->json(null, 204);
    }
}