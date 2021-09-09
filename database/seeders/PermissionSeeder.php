<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'crud user']);
        Permission::create(['name' => 'crud book']);
        Permission::create(['name' => 'crud category']);
        Permission::create(['name' => 'crud role']);
        Permission::create(['name' => 'resolve request']);
        Permission::create(['name' => 'hidden article']);

        // create roles and assign existing permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('crud user');
        $admin->givePermissionTo('crud book');
        $admin->givePermissionTo('crud category');
        $admin->givePermissionTo('resolve request');
        $admin->givePermissionTo('hidden article');


        $user = Role::create(['name' => 'user']);

        $modder = Role::create(['name' => 'modder']);
        $modder->givePermissionTo('crud book');
        $modder->givePermissionTo('hidden article');

        $super_admin = Role::create(['name' => 'Super Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $create_user = \App\Models\User::factory()->create([
            'name' => 'Pham Phan Bang',
            'email' => 'Phamphanbang@gmail.com',
            'image' => 'default.jpg',
            'password' => Hash::make('123123123'),
        ]);
        $create_user->assignRole($super_admin);

        $create_user = \App\Models\User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'image' => 'default.jpg',
            'password' => Hash::make('123123123'),
        ]);
        $create_user->assignRole($user);

        $create_user = \App\Models\User::factory()->create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'image' => 'default.jpg',
            'password' => Hash::make('123123123'),
        ]);
        $create_user->assignRole($admin);

        $create_user = \App\Models\User::factory()->create([
            'name' => 'modder1',
            'email' => 'modder1@gmail.com',
            'image' => 'default.jpg',
            'password' => Hash::make('123123123'),
        ]);
        $create_user->assignRole($modder);
    }
}
