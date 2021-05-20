<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'roles.store']); 
		Permission::create(['name' => 'roles.index']); 
		Permission::create(['name' => 'roles.create']);  
		Permission::create(['name' => 'roles.update']); 
		Permission::create(['name' => 'roles.show']);  
		Permission::create(['name' => 'roles.destroy']); 
		Permission::create(['name' => 'roles.edit']); 
		Permission::create(['name' => 'roles.active']); 
		Permission::create(['name' => 'roles.inactive']); 
		Permission::create(['name' => 'permissions.index']); 
		Permission::create(['name' => 'users.store']);  
		Permission::create(['name' => 'users.index']); 
		Permission::create(['name' => 'users.create']);
		Permission::create(['name' => 'users.update']); 
		Permission::create(['name' => 'users.show']);
		Permission::create(['name' => 'users.destroy']); 
		Permission::create(['name' => 'users.edit']);
		Permission::create(['name' => 'users.active']); 
		Permission::create(['name' => 'users.inactive']);
		Permission::create(['name' => 'users.pwd']); 		
		Permission::create(['name' => 'cities.store']); 
		Permission::create(['name' => 'cities.index']); 
		Permission::create(['name' => 'cities.create']); 
		Permission::create(['name' => 'cities.update']); 
		Permission::create(['name' => 'cities.show']); 
		Permission::create(['name' => 'cities.destroy']); 
		Permission::create(['name' => 'cities.edit']); 
		Permission::create(['name' => 'cities.active']); 
		Permission::create(['name' => 'cities.inactive']); 
		Permission::create(['name' => 'clients.store']); 
		Permission::create(['name' => 'clients.index']); 
		Permission::create(['name' => 'clients.create']); 
		Permission::create(['name' => 'clients.update']); 
		Permission::create(['name' => 'clients.show']); 
		Permission::create(['name' => 'clients.destroy']); 
		Permission::create(['name' => 'clients.edit']); 
		Permission::create(['name' => 'clients.active']); 
		Permission::create(['name' => 'clients.inactive']); 


		Permission::create(['name' => 'administration.index']);
		

        // create roles and assign created permissions       

        $role = Role::create(['name' => 'SuperAdministrator']);
        $role->givePermissionTo(Permission::all());	
		
		DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1
        ]);

    }
}