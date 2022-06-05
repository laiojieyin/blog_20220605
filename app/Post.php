<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model

{
    protected $fillable = ['title', 'content', 'category_id',];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function tagsToString()
    {
        $string = [];
        foreach ($this->tags as $key => $tag) {
            $string[] = $tag->name;
        }
        return implode(',', $string);
    }
}
