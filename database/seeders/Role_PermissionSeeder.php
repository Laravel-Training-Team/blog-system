<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Role_PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $permissions = [
           'show users',
           'create users',
           'edit users',
           'delete users',
           'edit own profile',

           'show roles',
           'create roles',
           'edit roles',
           'delete roles',
           'add permission role',

           'show posts',
           'create posts',
           'edit own posts',
           'delete own posts',

           'show categories',
           'create categories',
           'edit categories',
           'delete categories',

           
           'create comments',
           'delete own comments',
           'Approve comments',


       ];

       foreach ($permissions as $permission){
           Permission::firstOrCreate(['name' => $permission]);
       }

       $role=Role::firstOrCreate(['name'=>'admin']);
       $role->syncPermissions($permissions);
    }
}
