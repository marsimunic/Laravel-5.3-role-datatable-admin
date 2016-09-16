<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
         	[
        		'name' => 'user-list',
        		'display_name' => 'Mostrar lista de usuarios',
        		'description' => 'Ver solo lista de usuarios'
        	],
        	[
        		'name' => 'user-create',
        		'display_name' => 'Crear usuarios',
        		'description' => 'Crear nuevos usuarios'
        	],
        	[
        		'name' => 'user-edit',
        		'display_name' => 'Editar usuarios',
        		'description' => 'Editar usuarios'
        	],
        	[
        		'name' => 'user-delete',
        		'display_name' => 'Borrar usuarios',
        		'description' => 'Borrar usuarios'
        	]
        ];
        foreach ($permission as $key => $value) {

        	Permission::create($value);

        }
    }
}
