<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

//php artisan db:seed --class=PermissionTableSeeder
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
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'phonebook-list',
           'phonebook-create',
           'phonebook-edit',
           'phonebook-delete'
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}