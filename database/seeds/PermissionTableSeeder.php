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
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'log-list',
           'log-create',
           'log-edit',
           'log-delete',
           'contact-list',
           'contact-create',
           'contact-edit',
           'contact-delete'
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}