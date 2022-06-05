<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Post;
use App\Category;
use App\Tag;
use App\Http\Service\PostService;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts = $this->service->getAll();
        return view('welcome', ['posts' => $posts]);
    }

    public function create()
    {
        $posts = new Post;
        $categories = Category::all();
        return view('create', ['posts' => $posts, 'categories' => $categories]);
    }

    public function store(BlogRequest $request)
    {
        $this->service->store($request);
        return redirect('/');
    }

    public function edit(Post $id)
    {
        $categories = Category::all();
        return view('edit', ['post' => $id, 'categories' => $categories]);
    }

    public function update(BlogRequest $request, Post $id)
    {
        $this->service->update($request, $id);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $id)
    {
        $id->delete();
        return redirect('/');
    }
}
