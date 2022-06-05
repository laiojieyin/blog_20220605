<?php

namespace App\Http\Service;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostService
{
    public function getAll()
    {
        return Post::all();
    }

    public function store($request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->save();

        $string = $request->tags;
        $tags = explode(',', $string);
        $tags = array_filter($tags);

        foreach ($tags as $key => $tag) {
            $tag = trim($tag);
            $model = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($model->id);
        }
    }

    public function update($request, Post $id)
    {

        $id->fill($request->all());
        $id->save();

        $id->tags()->detach();

        $string = $request->tags;
        $tags = explode(',', $string);
        $tags = array_filter($tags);

        foreach ($tags as $key => $tag) {
            Log::debug("taga: $tag");
            $tag = trim($tag);
            $model = Tag::firstOrCreate(['name' => $tag]);
            $id->tags()->attach($model->id);
        }
    }
}
