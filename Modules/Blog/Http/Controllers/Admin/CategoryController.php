<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Blog\Http\Requests\GroupArticleRequest;


class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware("can:create_category")->only("store");
        $this->middleware("can:edit_category")->only("update");
        $this->middleware("can:delete_category")->only("delete");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupArticleRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);
        return ['massage' => 'دسته بندی با موفقیت ایجاد شد'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(GroupArticleRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);
        return ['massage' => 'دسته بندی با موفقیت ویرایش شد.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return ['massage' => 'دسته بندی با موفقیت حذف شد.'];
    }
}
