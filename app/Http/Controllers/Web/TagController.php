<?php

namespace App\Http\Controllers\Web;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function show()
    {
        //
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->all());
        $name = $tag->name;

        return redirect()->route('tags.index')->with(['message' => 'Tag ['.$name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->update($request->all());
        $name = $tag->name;

        return back()->with(['message' => 'Tag ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $name = $tag->name;
        $tag->delete();

        return back()->with(['message' => 'Tag ['.$name.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }
}
