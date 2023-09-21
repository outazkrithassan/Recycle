<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ObjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $user_id = 1; // Set user_id to 1 for all objects

        foreach (range(1, 10) as $index) {
            DB::table('objets')->insert([
                'Titre' => $faker->sentence(5),
                'Categorie' => $faker->randomElement(['Electronics', 'Clothing', 'Furniture', 'Books', 'Toys']),
                'Description' => $faker->paragraph(3),
                'Date_Annonce' => $faker->dateTimeThisYear,
                'Date_Recuperation' => $faker->dateTimeThisMonth,
                'Lieu_Recuperation' => $faker->city,
                'Etet_Objet' => $faker->randomElement(['état satisfaisant', 'Trés bon état', 'à réparer']),
                'user_id' => $user_id,
            ]);
        }
    }
}
