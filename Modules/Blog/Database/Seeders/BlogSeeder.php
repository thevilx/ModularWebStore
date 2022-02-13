<?php

namespace Modules\Blog\Database\Seeders;

use Modules\Blog\Entities\Tag;
use Illuminate\Database\Seeder;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\Category;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::factory(60)->create();
        $tags = Tag::factory(100)->create();

        Article::factory(1000)->create()->each(function ($article) use ($tags) {
            $article->category_id = Category::inRandomOrder()->first()->id;
            $article->save();
            $article->tags()->attach($tags->random(2));
        });

    }
}
