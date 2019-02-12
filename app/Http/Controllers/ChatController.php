<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redis;

class ChatController extends Controller
{
    public function postMessage(Request $request)
    {
        $response = ['message' => $request->message, 'user' => 'Admin'];
        $redis = Redis::connection();
        $redis->publish('message', json_encode($response));
        return response()->json($response, 200);
    }
    public function postadmMessage(Request $request)
    {
        $response = ['message' => $request->message, 'user' => 'Admin'];
        $redis = Redis::connection();
        $redis->publish('message', json_encode($response));
        return response()->json($response, 200);
    }
}
