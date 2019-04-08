<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Auth;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Resources\Post as PostResource;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepoInterface;

use App\Services\PostService;


class PostController extends BaseController {

    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req) {
        $items = Post::all();
        return PostResource::collection($items);
    }

    /**
     * Stores a newly created resource on storage
     *
     * @param  \Illuminate\Http\Request $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req) {

        $vb = Post::ValidationBook();
        $data = $req->validate($vb['rules'], $vb['messages']);

        $post = $this->postService->store($data);

        return new PostResource($post);
    }

    /**
     * Updates an existing resource
     *
     * @param  \Illuminate\Http\Request $req
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Post $post) {

        $vb = Post::ValidationBook();
        $data = $req->validate($vb['rules'], $vb['messages']);

        $post = $this->postService->update($data, $post);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, Post $post) {
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return new PostResource($post);
    }

}
