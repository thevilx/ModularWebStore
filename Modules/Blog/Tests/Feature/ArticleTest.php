<?php

namespace Modules\Blog\Tests\Feature;

use Tests\TestCase;
use Modules\Blog\Entities\Article;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
   /**
    * @test
    */
    public function show_article_test(){
        $random_article = Article::inRandomOrder()->first();
        $response = $this->get('api/articles/' . $random_article->slug);
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function show_all_article_test(){
        $response = $this->get('api/articles');
        $response->assertStatus(200);
    }
    /**
    * @test
    */
    public function show_all_special_articles_test(){
        $response = $this->get('api/getSpecialArticles');
        $response->assertStatus(200);
    }


}
