<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('role_has_permissions')->truncate();
        Schema::enableForeignKeyConstraints();
        $permissions = [
            ['guard_name' => 'web', 'name' => 'roles'],
            ['guard_name' => 'web', 'name' => 'add role'],
            ['guard_name' => 'web', 'name' => 'edit role'],
            ['guard_name' => 'web', 'name' => 'show role'],
            ['guard_name' => 'web', 'name' => 'delete role'],

        ];
        $role = Role::create([
            'name' => 'super_admin'
        ]);
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
        ]);
        Permission::insert($permissions);
        $role->syncPermissions(Permission::all());
        $user->assignRole($role);
    }
}
