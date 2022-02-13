<?php

namespace Modules\Blog\Http\Controllers;


use Modules\Blog\Entities\Tag;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\Category;
use App\Http\Controllers\Controller;
use Modules\Blog\Transformers\ArticleResource;



class BlogController extends Controller
{
    public function showAllArticles(){

        return ArticleResource::collection(Article::paginate(10));
    }

    public function getArticle(Article $article){
        $article['tags'] = $article->tags; // add tag relation to output
        return $article;
    }

    public function getSpecialArticles(){
        return ArticleResource::collection(Article::where("special" , 1)->paginate(10));
    }


    //*******************************
    // Categories
    //*******************************


    public function getAllCategories(){
        return Category::all();
    }

    public function getArticleCategory(Article $article){
        return $article->category;
    }

    public function getCategoryArticles(Category $category){
        return $category->articles;
    }


    //*******************************
    // Tags
    //*******************************

    public function getAllTags(){
        return Tag::all();
    }

    public function getArticleTags(Article $article){
        return $article->tags;
    }

    public function getTagArticles(Tag $tag){
        return $tag->articles;
    }

}
