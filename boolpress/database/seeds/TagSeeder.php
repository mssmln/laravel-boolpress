<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 10; $i++){
            $newTag = new Tag();
            $newTag->name = $faker->word(3,true);
            $slug = Str::slug($newTag->name);
            $lookForSlug = Tag::where('slug',$slug)->first();
            $counter = 1;
            $slugFirst = $slug;
            while($lookForSlug){
                $slug = $slugFirst . '-' .$counter;
                $lookForSlug = Tag::where('slug',$slug)->first();
                $counter++;
            }
            $newTag->slug = $slug;
            $newTag->save();
        }
    }
}
