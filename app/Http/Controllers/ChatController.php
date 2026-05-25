<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json'
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $request->message]
                ],
                'temperature' => 0.7
            ]);

            $result = $response->json();
            
            return response()->json([
                'reply' => $result['choices'][0]['message']['content']
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to get response from AI'
            ], 500);
        }
    }
}