<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::with('roles')
            ->where('id', '!=', 1)
            ->get();

        $roles = Role::all();

        return view('admins.index', compact('admins', 'roles'));
    }

    public function store(Request $request)
    {
        $data = $request->except('password', 'role_id');
        $data['password'] = bcrypt($request->password);
        $admin = Admin::create($data);
        $admin->roles()->attach($request->role_id);

        $name = $admin->name;

        return redirect()->route('admin.index')->with(['message' => 'Admin ['.$name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id)
    {
        $admin = Admin::where('id', $id)->with('roles')->first();

        $roles = Role::all();

        return view('admins.edit',compact('admin', 'roles'));
    }

    public function update($id, Request $request)
    {
        $admin = Admin::find($id);
        $data = $request->except('password', 'role_id');

        if($request->password != ''){
            $data['password'] = bcrypt($request->password);
        }

        $admin->update($data);

        $admin->roles()->sync($request->role_id);

        $name = $admin->name;

        return redirect()->route('admin.index')->with(['message' => 'Admin ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function status($id)
    {
        $admin = Admin::findOrFail($id);
        $name = $admin->name;

        if($admin->status === 1) {

            if(Auth::user()->id == $id){
                return redirect()->route('admin.index')->with(['message' => 'You can not disable your account!', 'type' => 'warning', 'icon' => 'times']);
            }

            $admin->status = 0;
            $admin->save();
        } else {
            $admin->status = 1;
            $admin->save();
        }

        return redirect()->route('admin.index')->with(['message' => 'Status of Admin ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.index')->with(['message' => 'You can not delete your account!', 'type' => 'warning', 'icon' => 'times']);
        }

        $admin = Admin::findOrFail($id);
        $admin->delete();

        $name = $admin->name;

        return redirect()->route('admin.index')->with(['message' => 'Admin ['.$name.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }
}
