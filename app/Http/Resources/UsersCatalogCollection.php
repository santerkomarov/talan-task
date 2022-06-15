<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersCatalogCollection extends ResourceCollection
{

    /**
     * The "equipment" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'users-catalog';


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * Add extra info in result array of data
     *
     * @var string
     */
    public function with($request)
    {
        return ['status' => 'success'];
    }
}
