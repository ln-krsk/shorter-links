<?php

namespace Database\Seeders;

use App\Models\User;
use Chiiya\FilamentAccessControl\Database\Seeders\FilamentAccessControlSeeder;
use Chiiya\FilamentAccessControl\Enumerators\RoleName;
use Chiiya\FilamentAccessControl\Models\FilamentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminSeeder extends Seeder
{
    public static array $users = [
        [
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
        ],

    ];
    public static array $permissions = [];

    public function run(): void
    {
        Model::unguard();
        app(PermissionRegistrar::class)->forgetCachedPermissions();
        $this->call(FilamentAccessControlSeeder::class);

        /** @var Role $role */
        $role = Role::findByName(RoleName::SUPER_ADMIN, 'filament');

        foreach (self::$users as $user) {
            $password = App::environment('local') ? 'pw123!' : null;
            $admin = User::query()->create(array_merge($user, [
                'password' => Hash::make($password ?: Str::random(40)),
                'expires_at' => now()->addMonths(12),
            ]));
            $admin->assignRole($role);
        }

        foreach (self::$permissions as $permission) {
            Permission::query()->create([
                'name' => $permission,
                'guard_name' => 'filament',
            ]);
            $role->givePermissionTo($permission);
        }
    }
}
