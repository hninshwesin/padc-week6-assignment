<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostResourceCollection extends ResourceCollection
{
//    public static $wrap = "posts";
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

//    public function with($request)
//    {
//        return [
//            'code' => '200',
//            'status' => "Post content is successfully retrieve"
//        ];
//    }
}
