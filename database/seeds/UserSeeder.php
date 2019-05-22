<?php

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

        DB::table('users')->insert([
            'isim' => "TEST Kullanıcısı",
            'email' => 'test@test.com',
            'password' => \Hash::make('12345678'),
            'admin'=>true
        ]);
    }
}
