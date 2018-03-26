<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function show()
    {

    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request, ImageRepository $repo)
    {
        $category = Category::create($request->except('primaryImage'));

        if ($request->hasFile('primaryImage')) {
            $category->path_image = $repo->saveImage($request->primaryImage, $category->id, 'categories', null, 100);
        }

        $category->save();
        $name = $category->name;

        return redirect()->route('categories.index')->with(['message' => 'Category ['.$name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, ImageRepository $repo, $id)
    {
        $category = Category::find($id);
        $category->update($request->except('primaryImage'));

        if ($request->hasFile('primaryImage')) {
            $category->path_image = $repo->saveImage($request->primaryImage, $category->id, 'categories', null, 100);
        }

        $category->save();
        $name = $category->name;

        return back()->with(['message' => 'Category ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $name = $category->name;
        $category->delete();
        return back()->with(['message' => 'Category ['.$name.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }
}
