<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();
        Category::factory(60)->create();
        $tags = Tag::factory(100)->create();

        Article::factory(1000)->create()->each(function ($article) use ($tags) {
            $article->category_id = Category::inRandomOrder()->first()->id;
            $article->save();
            $article->tags()->attach($tags->random(2));
        });
    }
}
