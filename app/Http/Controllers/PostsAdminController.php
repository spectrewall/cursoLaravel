<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Schema;

class PostsAdminController extends Controller
{
    /**
     * @var Post
     */

    private $post;

    public function __construct(Post $post, Tag $tag)
    {
        $this->post = $post;
        $this->tag = $tag;
    }

    public function index()
    {
        $posts = $this->post->paginate(5, ['*'], 'page');
        $tags = $this->tag->paginate(5, ['*'], 'tag-page');
        return view('admin.posts.index', compact('posts', 'tags'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
        $tag = $request->tags;
        $tagList = array_filter(array_map('trim', explode(',', $tag[0])));

        $post = $this->post->create($request->all());

        if (count($tagList) > 3) {
            return redirect()->route('admin.posts.edit', $post->id)->withErrors([
                'tags' => 'The maximum number of tags is 3.',
            ]);
        }

        $post->tags()->sync($this->getTagsIds($tagList));
        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $tag = $request->tags;
        $tagList = array_filter(array_map('trim', explode(',', $tag[0])));

        if (count($tagList) > 3) {
            return redirect()->route('admin.posts.edit', $id)->withErrors([
                'tags' => 'The maximum number of tags is 3.',
            ]);
        }

        $post = $this->post->find($id);
        $post->update($request->all());
        $post->tags()->sync($this->getTagsIds($tagList));
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        Schema::disableForeignKeyConstraints();
        $post = $this->post->find($id);
        $comments = $post->comments;
        foreach ($comments as $comment) {
            $comment->delete();
        }
        $posts_tags = $post->tags;
        foreach ($posts_tags as $tag) {
            $post->tags()->detach($tag->tag_id);
        }
        $post->delete();
        Schema::enableForeignKeyConstraints();
        return redirect()->route('admin.posts.index');
    }

    private function getTagsIds($tagsList)
    {
        $tagsIDs = [];
        foreach ($tagsList as $tagName) {
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }
        return $tagsIDs;
    }
}
