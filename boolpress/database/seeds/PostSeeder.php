<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker; // model faker to add
use App\Post; // model nostro to add so we can instance
use Illuminate\Support\Str; // model slug to add

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 10; $i++){
            $newPost = new Post();
            $newPost->title = $faker->sentence(2);
            $newPost->content = $faker->text(500);
            $newPost->slug = Str::slug($newPost->title); // usiamo lo slug per la prima volta , popolerà l'uri con un - tra le parole
            $newPost->save();
        }
    }
}
