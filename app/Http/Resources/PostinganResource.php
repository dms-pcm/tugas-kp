<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostinganResource extends JsonResource
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
            'attachment' => $this->when(!empty($this->attachment), asset(Storage::url($this->attachment))),
            'caption' => $this->caption,
            'created_at' => $this->created_at->format('l, d F Y H:i')
        ];
    }
}
