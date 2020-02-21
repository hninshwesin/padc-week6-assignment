<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
//    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'excerpt' => $this->excerpt,
            'title' => $this->title,
            'content' => \nl2br($this->content),
            'author_name' => $this->author->name,
            'is_published' => $this->is_published,
        ];
    }

//    public function with($request)
//    {
//        return [
//            'code' => '200',
//            'status' => "Post content is successfully retrieve"
//        ];
//    }
}
