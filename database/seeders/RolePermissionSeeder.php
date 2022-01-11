<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to fresh migration before seeding, it will clear all old data?')) {
            // Call the php artisan migrate:fresh
            $this->command->call('migrate:fresh');
            $this->command->warn("Data cleared, starting from blank database.");
        }

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        DB::table('roles')->delete();

        // Create roles
        $superAdmin = Role::create(['name' => 'Super Administrator']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Generic User']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Hospital Incharge']);
        Role::create(['name' => 'Technical Manager']);
        Role::create(['name' => 'Procurement Admin']);
        Role::create(['name' => 'Procurement Head']);

        $this->command->info('Default Roles added.');

        // Create super administrator
        $this->createSuperAdministrator($superAdmin);

        // Assign default permissions
        $this->assignPermissions();

    }

    protected function assignPermissions()
    {
        for ($i = 0; $i < count(self::defaultPermissions()); $i++) {
            $permissionGroup = self::defaultPermissions()[$i]['group_name'];
            for ($j = 0; $j < count(self::defaultPermissions()[$i]['permissions']); $j++) {
                Permission::create([
                    'name' => self::defaultPermissions()[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                ]);
            }
        }
    }

    public static function defaultPermissions(): array
    {
        return [
            [
                'group_name' => 'User',
                'permissions' => [
                    'users.create',
                    'users.view',
                    'users.edit',
                    'users.delete',
                ],
            ],

            [
                'group_name' => 'Role',
                'permissions' => [
                    'roles.create',
                    'roles.view',
                    'roles.edit',
                    'roles.delete',
                ],
            ],

            [
                'group_name' => 'Setting',
                'permissions' => [
                    'settings.view',
                    'settings.edit',
                ],
            ],

            [
                'group_name' => 'Profile',
                'permissions' => [
                    'profile.view',
                    'profile.edit',
                ],
            ],

            [
                'group_name' => 'Location',
                'permissions' => [
                    'locations.create',
                    'locations.view',
                    'locations.edit',
                    'locations.delete',
                ],
            ],

            [
                'group_name' => 'Manufacturer',
                'permissions' => [
                    'manufacturers.create',
                    'manufacturers.view',
                    'manufacturers.edit',
                    'manufacturers.delete',
                ],
            ],

            [
                'group_name' => 'Task',
                'permissions' => [
                    'tasks.create',
                    'tasks.view',
                    'tasks.edit',
                    'tasks.delete',
                    'tasks.download',
                ],
            ],
        ];
    }

    private function createSuperAdministrator($superAdministrator)
    {
        $user = User::where('email', 'superadmin@htaims.com')->first();

        if ($user === null) {

            $user = User::create([
                'name' => 'Super Administrator',
                'email' => 'superadmin@htaims.com',
                'password' => Hash::make('password'),
            ]);

            $user->assignRole($superAdministrator);

            $this->command->info('Here is your super administrator details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "password"');

        }
    }
}
