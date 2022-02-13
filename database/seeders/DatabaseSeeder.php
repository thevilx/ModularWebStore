<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
        'create_category',
         'delete_category' ,
         'edit_category'  , 
         'create_article',
         'delete_article',
         'edit_article',
         'create_tag',
         'delete_tag',
         'edit_tag',
        ];


        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(Permission::all());

        $user = User::find(1);
        $user->assignRole($role);
    }
}
