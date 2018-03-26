<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = Text::find(2);

        return view('texts.about', compact('about'));
    }

    public function update(Request $request)
    {
        $about = Text::find(2);
        $about->update($request->all());

        return redirect()->back()->with(['message' => 'About text successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }
}
