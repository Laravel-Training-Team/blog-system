<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
        return view('dashboard.roles_permission.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('dashboard.roles_permission.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $role= $request->validate([
            'name'=>['required', ' string', 'unique:roles,name']
        ]);

        Role::create($role);
        
        return redirect()->route('roles.index')->with('status','Roles Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('dashboard.roles_permission.roles.edit' ,compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required', ' string', 'unique:roles,name,'.$id],
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name'=>$request->name
        ]);

        return redirect()->route('roles.index')->with('status','Roles Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('roles.index')->with('status','Role Deleted Successfully');
    }
}
