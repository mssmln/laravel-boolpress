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

            //salviamo nella variabile lo slug costruito dal title
            $slug = Str::slug($newPost->title);
            //verifichiamo se nella table posts alla colonna slug troviamo il valore di $slug , il ::where vuole il ->first()
            $lookForSlug = Post::where('slug',$slug)->first();
            //un counter per incrementare qualora ci fossero stessi slug
            $counter = 1;
            //ci salviamo il primo slug per non incorrere in slug come prova-1-2 prova-1-2-3 ...
            $slugFirst = $slug;
            //non sappiamo quando si genererà lo slug identico, usiamo quindi while con la condizione di trovare lo slug nella colonna
            while($lookForSlug){
                //se lo trova, dallo slug first aggiungiamo -counter
                $slug = $slugFirst . '-' .$counter;
                //verifichiamo se ne trova altri di stessi slug
                $lookForSlug = Post::where('slug',$slug)->first();
                //incrementiamo per il prossimo stesso slug
                $counter++;
            }
            
            //adesso lo salviamo nella definitiva variabile
            $newPost->slug = $slug;
            $newPost->save();
        }
    }
}
