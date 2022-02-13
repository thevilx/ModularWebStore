<?php

namespace Modules\Blog\Tests\Feature;

use Tests\TestCase;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * @test
     */
    public function get_all_category()
    {
        $response = $this->get('api/categories');
        $response->assertStatus(200)->assertJsonStructure([
            [
                'id',
                'name',
                'created_at',
                'updated_at',
            ]
        ]);
    }

    /**
     * @test
     */
    public function get_category_articles()
    {
        $category = Category::inRandomOrder()->first();
        $response = $this->get('api/categories/' . $category->name);
        $response->assertStatus(200)->assertJsonStructure([
            [
                'id',
                'title',
                'slug',
                'description',
                'created_at',
                'updated_at',
            ]
        ]);
    }


    /**
     * @test
     */
    public function show_article_category_test()
    {
        $random_article = Article::inRandomOrder()->first();
        $response = $this->get('api/articles/category/' . $random_article->slug);
        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'name',
            'created_at',
            'updated_at',
        ]);
    }
}
