<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('groups.index', compact('groups'));
    }

    public function show()
    {

    }

    public function status($id)
    {
        $group = Group::find($id);
        $name = $group->name;

        if ($group->status == 0) {
            $group->update(['status' => 1]);
        } elseif ($group->status == 1){
            $group->update(['status' => 0]);
        }

        return back()->with(['message' => 'Group ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function create()
    {
        $categories = Category::all();

        return view('groups.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $group = Group::create($request->all());
        $name = $group->name;

        return redirect()->route('groups.index')->with(['message' => 'Group ['.$name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $categories = Category::all();

        return view('groups.edit', compact('group', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->update($request->all());
        $name = $group->name;

        return back()->with(['message' => 'Group ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $name = $group->name;
        $group->delete();

        return back()->with(['message' => 'Group ['.$name.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }
}
