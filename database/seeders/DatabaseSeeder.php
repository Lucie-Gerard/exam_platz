<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Database\Seeder;

// 4. I give the data that I really need to Category and I let the factory create 
//    the dummy data for the rest

// 5. In command line php artisan db:seed to add the data in the database
//    php artisan migrate:refresh --seed if need to do it again after everything was badly done
// ------------------------------


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.$table->integer('categorie_id'); 
     *
     * @return void
     */
    public function run()
    {    
        $categories = new Category();
        $categories->id=1;
        $categories->name="illustrator";
        $categories->logo="icon-ai.svg";
        $categories->save();

        $categories = new Category();
        $categories->id=2;
        $categories->name="photoshop";
        $categories->logo="icon-psd.svg";
        $categories->save();

        $categories = new Category();
        $categories->id=3;
        $categories->name="theme";
        $categories->logo="icon-themes.svg";
        $categories->save();

        $categories = new Category();
        $categories->id=4;
        $categories->name="font";
        $categories->logo="icon-font.svg";
        $categories->save();

        $categories = new Category();
        $categories->id=5;
        $categories->name="photo";
        $categories->logo="icon-photo.svg";
        $categories->save();

        $categories = new Category();
        $categories->id=6;
        $categories->name="premium";
        $categories->logo="icon-premium.svg";
        $categories->save();


        // foreach (range(1, 26) as $index) {
        //     if ($index <= 26) {
        //         $manualDataResources = 'manually_set_value';
        //     }
        // }
    

        Resource::factory(26)->create();
        Comment::factory(10)->create();
        User::factory(20)->create();
    }
}