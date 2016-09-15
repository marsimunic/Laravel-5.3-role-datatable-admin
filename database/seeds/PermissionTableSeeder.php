<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        
        $permission = [
        	[
        		'name' => 'role-list',
        		'display_name' => 'Mostrar lista de roles',
        		'description' => 'Ver solo lista de roles'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Crear roles',
        		'description' => 'Crear nuevos roles'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Editar Roles',
        		'description' => 'Editar Roles'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Borrar Roles',
        		'description' => 'Borrar Roles'
        	]
        ];
        foreach ($permission as $key => $value) {

        	Permission::create($value);

        }
    }
}
