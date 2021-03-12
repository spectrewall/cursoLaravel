<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\CommentRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct(Post $post, Tag $tag)
    {
        $this->post = $post;
        $this->tag = $tag;
    }

    public function index()
    {
        $posts = $this->post->paginate(10, ['*'], 'page');
        $tags = $this->tag->paginate(10, ['*'], 'tag-page');
        return view('posts.index', compact('posts', 'tags'));
    }

    public function search($id)
    {
        $posts = DB::table('posts_tags')->where('tag_id', $id)->paginate(10, ['*'], 'page');
        $tags = $this->tag->paginate(10, ['*'], 'tag-page');
        return view('posts.search', compact('posts', 'tags', 'id'));
    }

    public function post($id)
    {
        $post = Post::find($id);
        return view('posts.fullPost', compact('post'));
    }

    public function comment($id, CommentRequest $request)
    {
        $comment = Comment::make($request->all());
        $comment->post_id = $id;
        $comment->save();
        return redirect()->route('post', ['id' => $id]);
    }
}
