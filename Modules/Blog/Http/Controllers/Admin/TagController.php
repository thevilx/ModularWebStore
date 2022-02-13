<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Blog\Http\Requests\GroupArticleRequest;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware("can:create_tag")->only("store");
        $this->middleware("can:edit_tag")->only("update");
        $this->middleware("can:delete_tag")->only("delete");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupArticleRequest $request)
    {
        $validated = $request->validated();
        Tag::create($validated);
        return ['massage' => 'برچسب با موفقیت ایجاد شد.'];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validated();
        $tag->update($validated);
        return ['massage' => 'برچسب با موفقیت ویرایش شد.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return ['massage' => 'برچسب با موفقیت حذف شد.'];
    }
}
