<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
            'profile' => 'user.avif'
        ]);

        $writer = User::create([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('password')
        ]);



        $admin_role = Role::create(['name' => 'admin']);
        $writer_role = Role::create(['name' => 'user']);

        $permission = Permission::create(['name' => 'Post access','front_name'=>'post_access']);
        $permission = Permission::create(['name' => 'Post edit' ,'front_name'=>'post_edit']);
        $permission = Permission::create(['name' => 'Post create' ,'front_name'=>'post_create']);
        $permission = Permission::create(['name' => 'Post delete' ,'front_name'=>'post_delete']);

        $permission = Permission::create(['name' => 'Role access' ,'front_name'=>'role_access']);
        $permission = Permission::create(['name' => 'Role edit' ,'front_name'=>'role_edit']);
        $permission = Permission::create(['name' => 'Role create' ,'front_name'=>'role_create']);
        $permission = Permission::create(['name' => 'Role delete','front_name'=>'role_delete']);

        $permission = Permission::create(['name' => 'User access','front_name'=>'user_access']);
        $permission = Permission::create(['name' => 'User edit','front_name'=>'user_edit']);
        $permission = Permission::create(['name' => 'User create','front_name'=>'user_create']);
        $permission = Permission::create(['name' => 'User delete','front_name'=>'user_delete']);

        $permission = Permission::create(['name' => 'Permission access','front_name'=>'permission_access']);
        $permission = Permission::create(['name' => 'Permission edit','front_name'=>'permission_edit']);
        $permission = Permission::create(['name' => 'Permission create','front_name'=>'permission_create']);
        $permission = Permission::create(['name' => 'Permission delete','front_name'=>'permission_delete']);

        $permission = Permission::create(['name' => 'Mail access','front_name'=>'mail_access']);
        $permission = Permission::create(['name' => 'Mail edit','front_name'=>'mail_edit']);



        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);


        $admin_role->givePermissionTo(Permission::all());
    }
}
