<?php

namespace Modules\Blog\Tests\Feature;

use Tests\TestCase;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Entities\Article;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    /**
     * @test
     */
    public function get_all_tags()
    {
        $response = $this->get('api/tags');
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
    public function get_tag_articles()
    {
        $tag = Tag::inRandomOrder()->first();
        $response = $this->get('api/tags/' . $tag->name);
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
    public function show_article_all_tags_test()
    {
        $random_article = Article::inRandomOrder()->first();
        $response = $this->get('api/articles/tags/' . $random_article->slug);
        $response->assertStatus(200)->assertJsonStructure([
            [
                'id',
                'name',
                'created_at',
                'updated_at',
            ]
        ]);
    }
}
