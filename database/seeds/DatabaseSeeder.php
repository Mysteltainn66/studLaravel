<?php

use Illuminate\Database\Seeder;
use App\Categories;
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
        $this->call(UsersTableSeeder::class);
        $this->call(PhotoCategoriesTableSeeder::class);

        //Создать 200 тестовых аккаунтов
        //factory(App\User::class, 200)->create();

    }
}
