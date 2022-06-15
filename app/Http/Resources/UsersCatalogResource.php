<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\UsersCatalog;

class UsersCatalogResource extends JsonResource
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
            'fio'=>$this->fio,
            'email'=>$this->email,
            'phone'=>$this->phone,
            // extra field
            //'album' =>'a1'
        ];
    }
}
