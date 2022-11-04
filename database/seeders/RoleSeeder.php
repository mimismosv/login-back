<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/* Creating two roles, Admin and User. */
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);


/* Creating a permission called `cities.index` and then syncing it with the roles `role1` and
`role2`. */
        $permission1 = Permission::create(['name' => 'cities.index'])->syncRoles([$role1,$role2]);
        $permission2 = Permission::create(['name' => 'cities.store'])->syncRoles([$role1]);
        $permission3 = Permission::create(['name' => 'cities.show'])->syncRoles([$role1,$role2]);
        $permission4 = Permission::create(['name' => 'cities.update'])->syncRoles([$role1]);
        $permission5 = Permission::create(['name' => 'cities.destroy'])->syncRoles([$role1]);


    }
}
