<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $moderator = Role::create(['name' => 'moderator']);
        $writer = Role::create(['name' => 'publisher']);
        $user = Role::create(['name' => 'user']);
        $banned = Role::create(['name' => 'banned']);

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'create news',
            'edit news',
            'create comments',
            'like comments',
            'edit comments',
            'delete comments',
            'user-ban'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin->givePermissionTo(Permission::all());

        $moderator->givePermissionTo([
            Permission::where('name', 'create comments')->first(),
            Permission::where('name', 'edit comments')->first(),
            Permission::where('name', 'delete comments')->first(),
            Permission::where('name', 'like comments')->first(),
            Permission::where('name', 'user-ban')->first(),
        ]);

        $writer->givePermissionTo([
            Permission::where('name', 'create news')->first(),
            Permission::where('name', 'create comments')->first(),
            Permission::where('name', 'like comments')->first(),
        ]);

        $user->givePermissionTo([
            Permission::where('name', 'create comments')->first(),
            Permission::where('name', 'like comments')->first(),
        ]);

        $admin = User::find(1);
        $admin->assignRole('admin');

        $moder = User::find(2);
        $moder->assignRole('moderator');

        $publisher = User::find(3);
        $publisher->assignRole('publisher');

        User::find(4)->assignRole('user');
        User::find(5)->assignRole('user');

    }
}
