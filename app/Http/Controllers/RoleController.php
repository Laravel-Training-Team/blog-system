<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

      
    /* Display a listing of the resource.
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
        
        return redirect()->route('roles.index')->with('status','Role Created Successfully');

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

        return redirect()->route('roles.index')->with('status','Role Updated Successfully');

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

      // that show page of permission to role
    public function addPermissionToRole(string $id)
    {
       $permissions= Permission::get();
       $role= Role::findOrFail($id);

       $rolePermissions=$role->permissions->pluck('id')->toArray();
        return view('dashboard.roles_permission.roles.addOrEditRolePermission' ,compact(['permissions','role','rolePermissions']));
    }

       ///   that save permissions to role 
    public function updatePermissionToRole(Request $request, string $id)
    {
        $request->validate([
                'permissions'=> ['required'],
        ]);
      
       $role= Role::findOrFail($id);

       $role->syncPermissions($request-> permissions);
        return redirect()->route('roles.index')->with('status','Permissions added to Role  ' .$role->name);
    }
}
