<?php

namespace Database\Seeders;

use App\Models\Setting;
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
        DB::table('settings')->truncate();
        DB::table('role_has_permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        # Clinic Permissions
        $clinicsRPermissions = [
            'patients',
            'add patients',
            'edit patients',
            'show patients',
            'delete patients',
            'reservations',
            'add reservations',
            'edit reservations',
            'show reservations',
            'delete reservations',
            'show today reservations',
        ];

        # Admin Permissions
        $permissions = [
            ['guard_name' => 'web', 'name' => 'roles'],
            ['guard_name' => 'web', 'name' => 'add role'],
            ['guard_name' => 'web', 'name' => 'edit role'],
            ['guard_name' => 'web', 'name' => 'show role'],
            ['guard_name' => 'web', 'name' => 'delete role'],

            ['guard_name' => 'web', 'name' => 'doctors'],
            ['guard_name' => 'web', 'name' => 'add doctors'],
            ['guard_name' => 'web', 'name' => 'edit doctors'],
            ['guard_name' => 'web', 'name' => 'show doctors'],
            ['guard_name' => 'web', 'name' => 'delete doctors'],

            ['guard_name' => 'web', 'name' => 'specialization'],
            ['guard_name' => 'web', 'name' => 'add specialization'],
            ['guard_name' => 'web', 'name' => 'edit specialization'],
            ['guard_name' => 'web', 'name' => 'show specialization'],
            ['guard_name' => 'web', 'name' => 'delete specialization'],

            ['guard_name' => 'web', 'name' => 'clinics'],
            ['guard_name' => 'web', 'name' => 'add clinics'],
            ['guard_name' => 'web', 'name' => 'edit clinics'],
            ['guard_name' => 'web', 'name' => 'show clinics'],
            ['guard_name' => 'web', 'name' => 'delete clinics'],

            ['guard_name' => 'web', 'name' => 'patients'],
            ['guard_name' => 'web', 'name' => 'add patients'],
            ['guard_name' => 'web', 'name' => 'edit patients'],
            ['guard_name' => 'web', 'name' => 'show patients'],
            ['guard_name' => 'web', 'name' => 'delete patients'],

            ['guard_name' => 'web', 'name' => 'reservations'],
            ['guard_name' => 'web', 'name' => 'add reservations'],
            ['guard_name' => 'web', 'name' => 'edit reservations'],
            ['guard_name' => 'web', 'name' => 'show reservations'],
            ['guard_name' => 'web', 'name' => 'delete reservations'],
            ['guard_name' => 'web', 'name' => 'show today reservations'],

            ['guard_name' => 'web', 'name' => 'update settings'],
            ['guard_name' => 'web', 'name' => 'contact us list'],
            ['guard_name' => 'web', 'name' => 'contact us delete'],
        ];

        # Admin Role
        $role = Role::create([
            'name' => 'super_admin'
        ]);



        # Create First Settings
        Setting::create([
           'header' => 'welcome in tecs',
           'about' => 'about tecs',
        ]);

        # Admin User
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'type_type' => 0,
            'type_id' => 0,
        ]);
        Permission::insert($permissions);
        $allPermissions = Permission::all();
        $role->syncPermissions($allPermissions);
        $user->assignRole($role);


        # Clinic Role
        $clinicRole = Role::create([
            'name' => 'clinic'
        ]);
        $resultCollection = [];
        $allPermissions->map(function ($permission) use ($clinicsRPermissions,&$resultCollection){
            if (in_array($permission->name, $clinicsRPermissions)){
                $resultCollection[] = $permission;
            }
        });
        $clinicRole->syncPermissions($resultCollection);
    }
}
