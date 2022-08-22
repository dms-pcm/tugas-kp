<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Postingan extends Model
{
    use HasFactory,SoftDeletes, Userstamps;

    protected $table = 'postingan';

    protected $fillable = [
        'attachment',
        'caption',
        'created_by',
        'updated_by',
        'deleted_at',
    ];
}
