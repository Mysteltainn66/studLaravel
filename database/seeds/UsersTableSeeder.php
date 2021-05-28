<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
            'name'          => 'Admin',
            'phone'         => '380971234567',
            'email'         => 'a@a.loc',
            'password'      => Hash::make('qwertyqip'),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'is_admin'      => 1,
        ]);

        User::create([
            'name'          => 'User',
            'phone'         => '380971111111',
            'email'         => 'user@user.loc',
            'password'      => Hash::make('qwertyqip'),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'is_admin'      => 0,
        ]);

        //Создать 200 тестовых аккаунтов
        //factory(App\User::class, 200)->create();
    }
}
