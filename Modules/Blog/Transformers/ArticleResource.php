<?php

namespace Modules\Blog\Transformers;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'description' =>  Str::of($this->resource->description)->words(10),
        ];
    }
}
