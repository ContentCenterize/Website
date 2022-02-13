<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'read_all_posts']);
        Permission::create(['name' => 'read_all_third_parties']);
        Permission::create(['name' => 'override_robots']);
        Permission::create(['name' => 'edit_category']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        User::whereEmail('admin@admin.com')->first()->assignRole($role);
    }
}
