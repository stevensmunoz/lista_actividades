<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear Usuarios de prueba
        factory(User::class)->create([
            'name' => 'Usuario Prueba',
            'email' => 'prueba@example.com'
        ]);

        // crea 5 usuarios de prueba aleatorios
        factory(User::class, 5)->create();
    }
}
