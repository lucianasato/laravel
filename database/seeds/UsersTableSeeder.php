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
            'cpf' => '99999999999',
            'phone' => '11989899887',
        ]);

        factory(\App\User::class, 1)->states('user')->create([
            'email' => 'user@email.com'
        ]);

        factory(\App\User::class, 1)->states('user')->create([
            'email' => 'user3@email.com'
        ]);
    }
}
