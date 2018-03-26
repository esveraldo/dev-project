<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        $texts = Text::all();

        return response()->json($texts, 200);
    }

    public function show($id)
    {
        $text = Text::find($id);

        if(!$text) {
            return response()->json(['message' => 'Text not found'], 404);
        }

        return response()->json($text, 200);
    }
}
