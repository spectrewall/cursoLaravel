<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content'
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'posts_tags');
    }

    public function getTagListAttribute()
    {
        $tagsNames = [];
        $tags = $this->tags;
        foreach ($tags as $tag) {
            array_push($tagsNames, $tag->name);
        }
        return implode(', ', $tagsNames);
    }

    public function getCreatedAtFormatAttribute()
    {
        return $this->created_at->format('Y-M-d H:i');
    }

    public function getUpdatedAtFormatAttribute()
    {
        return $this->updated_at->format('Y-M-d H:i');
    }
}
