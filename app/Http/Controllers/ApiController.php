<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function status() {
        return response()->json([
            'status' => 'ok',
            'message' => 'API is running'
        ], 200);
    }

    public function clients() {
        
        $clients = Client::paginate(10);
        
        return response()->json([
            'status' => 'ok',
            'message' => 'success',
            'data' => $clients
        ], 200);

    }

    public function clientById($id) {
        $client = Client::findOrFail($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'success',
            'data' => $client
        ], 200);
    }

    public function client(Request $request) {
        if(!$request->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'client id is required',
            ], 400);
        }

        $client = Client::findORFail($request->id);

        return response()->json([
            'status' => 'ok',
            'message' => 'success',
            'data' => $client
        ], 200);
    }

    public function addClient(Request $request) {
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();

        return response()->json([
            'status' => 'ok',
            'message' => 'success',
            'data' => $client
        ], 200);
    }

    public function updateClient(Request $request) {
        if(!$request->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'client id is required',
            ], 400);
        }

        $client = Client::findORFail($request->id);

        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();

        return response()->json([
            'status' => 'ok',
            'message' => 'success',
            'data' => $client
        ], 200);

    }

    public function deleteClient(Request $request) {
        if(!$request->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'client id is required',
            ], 400);
        }

        $client = Client::findORFail($request->id);
        $client->delete();

        return response()->json([
            'status' => 'ok',
            'message' => 'success'
        ], 200);

    }


}
