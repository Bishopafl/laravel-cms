<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// import soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    //
    protected $fillable = [
        'title',
        'content'
    ];
}
