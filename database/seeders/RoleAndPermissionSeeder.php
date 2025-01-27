<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit-articles']);
        $adminRole = Role::create(['name' => 'admin']);
        $otherRole = Role::create(['name' => 'other']);
        $adminRole->givePermissionTo('edit-articles');
        $user = User::find('1');
        $user->assignRole('admin');
        $role = Role::findByName('admin');
        $role->givePermissionTo('edit-articles');
    }
}
