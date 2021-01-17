<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'department-list',
           'department-create',
           'department-edit',
           'department-delete',
           'blood-list',
           'blood-create',
           'blood-edit',
           'blood-delete'
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
