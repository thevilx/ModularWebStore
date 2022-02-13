<?php

namespace Modules\Blog\Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminArticleTest extends TestCase
{
    /**
     * @test
     */
    public function show_article_test()
    {
        $random_article = Article::inRandomOrder()->first();
        $response = $this->get('api/articles/' . $random_article->slug);
        $response->assertStatus(200);
    }

}
