<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('post.view');
        $posts = Post::with('category')->latest()->paginate(7);

        return view('admin.Post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('post.create');
        $post = new Post();
        $categories = Category::all();
        $tags = implode(',', $post->tags()->pluck('name')->toArray());
        return view('admin.post.create', compact('post','categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        Gate::authorize('post.create');
        $data = $request->except('image');
        if ($request->hasFile('image')) { //check isset image

            $file = $request->file('image'); //return object
            $path_name = 'Post' . date('d-m-y');
            $path = $file->store('uploads/posts', ['disk' => 'public']);
            $data['image'] = $path;
        }
        $data['user_id'] = Auth::user()->id;

        $post=Post::create($data);


         //dd($request->post('tags'));
         $tags=explode(',',$request->post('tags'));
         $tags_id=[];

         $saved_tags=Tag::all();//return Array on statment

         foreach($tags as $tagName)
         {
            $slug=Str::slug($tagName);
           // $tag=Tag::where('slug',$slug)->first();
            $tag=$saved_tags->where('slug',$slug)->first();
            if( ! $tag)
            {
                $tag=Tag::create
                ([
                   'name'=>$tagName,
                   'slug'=>$slug,
                ]);
            }
            $tags_id[]=$tag->id;
         }
         //sync use relation m:m onlay
         $post->tags()->sync($tags_id);
        return redirect()->route('post.index')->with('success', __('operation addion accomplished successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('post.update');
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = implode(',', $post->tags()->pluck('name')->toArray());
        return view('admin.post.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        Gate::authorize('post.update');
        $post = Post::findOrFail($id);

        $old_image = $post->image;
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/posts', ['disk' => 'public']);
            $data['image'] = $path;
        }
        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }
        $data['user_id'] = Auth::user()->id;
        $post->update($data);

        //dd($request->post('tags'));
        $tags = explode(',', $request->post('tags'));
        $tags_id = [];

        $saved_tags = Tag::all(); //return Array on statment

        foreach ($tags as $tagName) {
            $slug = Str::slug($tagName);
            // $tag=Tag::where('slug',$slug)->first();
            $tag = $saved_tags->where('slug', $slug)->first();
            if (!$tag) {
                $tag = Tag::create([
                        'name' => $tagName,
                        'slug' => $slug,
                    ]);
            }
            $tags_id[] = $tag->id;
        }
        //sync use relation m:m onlay
        $post->tags()->sync($tags_id);


        return redirect()->route('post.index')->with('success', __('operation updation accomplished successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('post.delete');
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', __("Post deletion completed Successfully"));
    }

    public function trash()
    {
        Gate::authorize('post.trash');
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trash', compact('posts'));
    }

    public function forceDelete($id)
    {
        Gate::authorize('post.forceDelete');
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        return redirect()->back()->with('success', __("Post deletion completed Successfully"));
    }

    public function restore($id)
    {
        Gate::authorize('post.restore');
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back()->with('success', __("Post  completed Successfully"));
    }

    public function restoreAll()
    {
        Gate::authorize('post.restoreAll');
        Post::onlyTrashed()->restore();
        return redirect()->back()->with('success', __("Post deletion completed Successfully"));
    }
}
