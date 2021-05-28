<?php

use App\Categories;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class PhotoCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'Без категории';
        $categories[] = [
            'name'          => $cName,
            'is_active'     => rand(0, 1),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ];

        for ($i = 2; $i <= 11; $i++){
            $cName      = 'Категория #' .$i;
            $isActive   = rand(0, 1);

            $categories[] = [
                'name'          => $cName,
                'is_active'     => $isActive,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ];
        }

        Categories::insert($categories);
    }
}
