<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Blog\Http\Requests\ArticleRequest;


class ArticleController extends Controller
{

    public function __construct(){
        $this->middleware("create_article")->only("store");
        $this->middleware("edit_article")->only("update");
        $this->middleware("delete_article")->only("delete");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $validator = $request->validated();
        $filePath = Null;
        $slug = Str::slug($validator['title']);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $slug . '_' . time();
            $folder = '/uploads/article-images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/article-images/') , $name  . '.' . $image->getClientOriginalExtension());
        }

        $articles = Article::create([
            'title' => $validator['title'],
            'user_id' => $request->user()->id,
            'slug' => $slug,
            // 'status' => $request->status,
            'description' => $validator['description'],
            'image' => $filePath,
            'categorie_id' => $request->category,
        ]);

        // $articles->tags()->attach($request->tags);

        return ['massage' => "مطلب مورد نظر با موفقیت ایجاد شد."];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize('own_article', $article);

        $validator = $request->validated();

        $filePath = Null;
        $slug = Str::slug($validator['title']);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $slug . '_' . time();
            $folder = '/uploads/article-images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/article-images/'), $name  . '.' . $image->getClientOriginalExtension());
        }

        $article->update([
            'title' => $validator['title'],
            'user_id' => $request->user()->id,
            'slug' => $slug,
            // 'status' => $request->status,
            'description' => $validator['description'],
            'image' => $filePath,
            'categorie_id' => $request->category,
        ]);

        return ['massage' => "مطلب مورد نظر با موفقیت ویرایش شد."];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('own_article', $article);
        $article->delete();
        return ['massage' => 'مطلب مورد نظر با موفقیت حذف شد.'];
    }
}
