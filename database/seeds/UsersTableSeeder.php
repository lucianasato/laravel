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
        factory(\App\User::class, 1)->states('admin')->create([
            'email' => 'admin@email.com',
            'cpf' => '00000000',
            'phone' => '(99)99999-9999',
        ]);

        factory(\App\User::class, 1)->states('user')->create([
            'email' => 'user@email.com'
        ]);

        factory(\App\User::class, 1)->states('user')->create([
            'email' => 'user3@email.com'
        ]);
    }
}
