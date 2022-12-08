<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        $users = User::all();
        foreach($users as $user){
            $user->assignRole('Reader');
        }

        User::create([
             'name' => 'Juan Gomez',
             'email' => 'juan.gomez@gmail.com',
             'password' => bcrypt('password'),
        ])->assignRole('Librarian');

        User::create([
            'name' => 'Marcia Ramos',
            'email' => 'marcia.ramos@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Admin');
    }
}
