<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'comment',
        'name',
        'email',
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
