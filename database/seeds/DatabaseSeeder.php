<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
        //Создает админ аккаунт
        User::create([
            'name'          => 'Admin',
            'phone'         => '380971234567',
            'email'         => 'a@a.loc',
            'password'      => Hash::make('qwertyqip'),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'is_admin'      => 1,
        ]);

        //Создать 200 тестовых аккаунтов
        //factory(App\User::class, 200)->create();
    }
}
