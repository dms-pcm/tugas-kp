<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Karyawan extends Model
{
    use HasFactory,SoftDeletes, Userstamps;

    protected $table = 'data_karyawan';

    protected $fillable = [
        'attachment',
        'attachment_sampul',
        // 'no_induk',
        // 'email',
        // 'no_telp',
        // 'jabatan',
        'jenis_jabatan',
        'bio',
        // 'alamat',
        // 'provinsi',
        // 'kode_pos',
        // 'negara',
        'created_by',
        'updated_by',
        'deleted_at',
    ];
}
