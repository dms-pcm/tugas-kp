<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'created_at' => (!empty($this->created_at)) ? Carbon::parse($this->created_at)->format('Y-m-d H:i:s') : null,
            'updated_at' => (!empty($this->updated_at)) ? Carbon::parse($this->updated_at)->format('Y-m-d H:i:s') : null,
            'deleted_at' => (!empty($this->deleted_at)) ? Carbon::parse($this->deleted_at)->format('Y-m-d H:i:s') : null,
        ];
    }
}
