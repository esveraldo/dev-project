<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $roles       = Role::all();
        $permissions = Permission::all();

        return view('profiles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->attach($request->permission_id);

        $name = $role->name;

        return redirect()->route('profiles.index')->with(['message' => 'Profile ['.$name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }
}
