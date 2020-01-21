<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $primaryKey = 'tag_id';

    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(
            Post::class,
            'post_tag',
            'tag_tag_id',
            'post_post_id',
            'tag_id',
            'post_id'
        );
    }
}
