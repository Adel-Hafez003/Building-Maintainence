<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function classifyImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120',
        ]);

        $file = $request->file('image');

        $response = Http::attach(
            'file',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
        )->post('http://127.0.0.1:8001/predict-image');

        if (!$response->successful()) {
            return response()->json([
                'success' => false,
                'message' => 'AI service failed',
                'error' => $response->json(),
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $response->json(),
        ]);
    }
}
