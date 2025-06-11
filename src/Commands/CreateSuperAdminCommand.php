<?php

namespace JCS\RolePermission\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use JCS\RolePermission\Models\Role;

class CreateSuperAdminCommand extends Command
{
    protected $signature = 'role-permission:super-admin';
    protected $description = 'Create a Super Admin user';

    public function handle()
    {
        $userModel = config('rolepermission.user_model');
        $userNameColumn = config('rolepermission.user_name_column');
        $userEmailColumn = config('rolepermission.user_email_column');
        $userPasswordColumn = config('rolepermission.user_password_column');

        $name = $this->ask("Enter Super Admin {$userNameColumn}:");
        $email = $this->ask("Enter Super Admin {$userEmailColumn}:");
        $password = $this->secret('Enter Password:');

        $superAdminRole = Role::firstOrCreate(['name' => config('rolepermission.super_admin_role')]);

        $user = $userModel::firstOrCreate([
            $userEmailColumn => $email,
        ],[
            $userPasswordColumn => Hash::make($password),
            $userNameColumn => $name,
        ]);

        $user->roles()->attach($superAdminRole->id);

        $this->info("Super Admin user created successfully.");
    }
}
