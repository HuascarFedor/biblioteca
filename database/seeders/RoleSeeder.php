<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rol de administrador
        $roleAdmin = Role::create([
            'name' => 'Admin'
        ]);
        // Rol de bibliotecario
        $roleLibrarian = Role::create([
            'name' => 'Librarian'
        ]);
        // Rol de lector
        $roleReader = Role::create([
            'name' => 'Reader'
        ]);

        // Permiso para ver la lista de autores
        Permission::create([
            'name' => 'authors.index'
        ])->assignRole($roleLibrarian);
        // Permiso para crear nuevos autores
        Permission::create([
            'name' => 'authors.create'
        ])->assignRole($roleLibrarian);
        // Permiso para modificar autores
        Permission::create([
            'name' => 'authors.edit'
        ])->assignRole($roleLibrarian);
        // Permiso para eliminar autores
        Permission::create([
            'name' => 'authors.destroy'
        ])->assignRole($roleLibrarian);
    }
}
