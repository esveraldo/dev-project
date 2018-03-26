<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function edit()
    {
        $term = Text::find(1);

        return view('texts.term', compact('term'));
    }

    public function update(Request $request)
    {
        $about = Text::find(1);
        $about->update($request->all());

        return redirect()->back()->with(['message' => 'Terms text successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }
}
