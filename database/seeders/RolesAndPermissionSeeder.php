<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Roles
        $roleModerator = Role::create(['name' => 'selenium-moderator', 'guard_name' => 'api']);
        $roleUser = Role::create(['name' => 'selenium-user', 'guard_name' => 'api']);
        $roleBanned = Role::create(['name' => 'selenium-banned', 'guard_name' => 'api']);

        //Permissions
        $permissionCreateMessage = Permission::create(['name' => 'create-message', 'guard_name' => 'api']);
        $permissionReadMessage = Permission::create(['name' => 'read-message', 'guard_name' => 'api']);
        $permissionUpdateMessage = Permission::create(['name' => 'update-message', 'guard_name' => 'api']);
        $permissionDeleteMessage = Permission::create(['name' => 'delete-message', 'guard_name' => 'api']);

        $permissionCreateChat = Permission::create(['name' => 'create-chat', 'guard_name' => 'api']);
        $permissionReadChat = Permission::create(['name' => 'read-chat', 'guard_name' => 'api']);
        $permissionUpdateChat = Permission::create(['name' => 'update-chat', 'guard_name' => 'api']);
        $permissionDeleteChat = Permission::create(['name' => 'delete-chat', 'guard_name' => 'api']);

        $permissionCreateReport = Permission::create(['name' => 'create-report', 'guard_name' => 'api']);
        $permissionReadReport = Permission::create(['name' => 'read-report', 'guard_name' => 'api']);
        $permissionUpdateReport = Permission::create(['name' => 'update-report', 'guard_name' => 'api']);
        $permissionDeleteReport = Permission::create(['name' => 'delete-report', 'guard_name' => 'api']);

        $permissionCreateSanction = Permission::create(['name' => 'create-sanction', 'guard_name' => 'api']);
        $permissionReadSanction = Permission::create(['name' => 'read-sanction', 'guard_name' => 'api']);
        $permissionUpdateSanction = Permission::create(['name' => 'update-sanction', 'guard_name' => 'api']);
        $permissionDeleteSanction = Permission::create(['name' => 'delete-sanction', 'guard_name' => 'api']);

        $roleModerator->givePermissionTo([
            $permissionReadSanction, $permissionUpdateSanction, $permissionCreateSanction, $permissionDeleteSanction,
            $permissionReadChat, $permissionUpdateChat, $permissionCreateChat, $permissionDeleteChat,
            $permissionReadReport, $permissionCreateReport, $permissionUpdateReport, $permissionDeleteReport,
            $permissionCreateMessage, $permissionReadMessage, $permissionUpdateMessage, $permissionDeleteMessage,
        ]);

        $roleUser->givePermissionTo([
            $permissionReadSanction, $permissionUpdateSanction, $permissionCreateSanction, $permissionDeleteSanction,
            $permissionReadChat, $permissionUpdateChat, $permissionCreateChat, $permissionDeleteChat,
            $permissionReadReport, $permissionCreateReport, $permissionUpdateReport, $permissionDeleteReport,
            $permissionCreateMessage, $permissionReadMessage, $permissionUpdateMessage, $permissionDeleteMessage,
        ]);
    }
}
