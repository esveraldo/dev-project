<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('products')->get();

        return response()->json($groups,200);
    }

    public function show($id)
    {
        $group = Group::find($id)->products()->where('status', 1)->with('tags')->get();

        if (!$group) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($group,200);
    }
}
