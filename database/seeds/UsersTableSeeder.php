<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Super Admin',
            'email' => 'root@root.com',
            'password' => bcrypt('aE%0xtW[[YUnm}nQ')
        ]);

        $user->assignRole('Super Admin');
        // $user->givePermissionTo(Permission::all());

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
