<?php

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
        \App\User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        \App\User::create([
            'name' => 'Invitado',
            'email' => 'invitado@invitado.com',
            'password' => bcrypt('invitado')
        ]);
    }
}
