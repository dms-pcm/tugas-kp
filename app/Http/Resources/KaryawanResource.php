<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class KaryawanResource extends JsonResource
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
            'attachment_sampul' => $this->when(!empty($this->attachment_sampul), asset(Storage::url($this->attachment_sampul))),
            // 'no_induk' => $this->no_induk,
            // 'email' => $this->email,
            // 'no_telp' => $this->no_telp,
            // 'jabatan' => $this->jabatan,
            'jenis_jabatan' => $this->jenis_jabatan,
            'bio' => $this->bio
            // 'alamat' => $this->alamat,
            // 'provinsi' => $this->provinsi,
            // 'kode_pos' => $this->kode_pos,
            // 'negara' => $this->negara,
            'created_at' => $this->created_at->format('l, d F Y H:i')
        ];
    }
}
