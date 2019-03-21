<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'Salim Arizi',
          'email' => 'salim@arizi.com',
          'nik' => '111222333',
          'password' => bcrypt('admin')
        ]);
    }
}
