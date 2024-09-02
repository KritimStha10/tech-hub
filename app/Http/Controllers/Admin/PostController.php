<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category');
        if(\request('title')){
            $key = \request('title');
            $posts = $posts->where('title','like','%'.$key.'%');
        }
        $posts = $posts->paginate(config('custom.per_page'));
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $post = new Post($request->all());
        $post->user_id = Auth::id();




        if($request->hasFile('featured_image')){
            $extension = \request()->file('featured_image')->getClientOriginalExtension();
            $image_folder_type = array_search('post',config('custom.image_folders')); //for image saved in folder

            $count = rand(100,999);

            $out_put_path = User::save_image(\request('featured_image'),$extension,$count,$image_folder_type);
            is_array($out_put_path) ? $post->featured_image = $out_put_path[0] : $post->featured_image = $out_put_path;
        }

        $post->save();
        return redirect('admin/posts')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.show', compact('post', 'categories'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $post=Post::findorfail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $post->update($request->all());


        if($request->hasFile('featured_image')){

            $extension = \request()->file('featured_image')->getClientOriginalExtension();

            $image_folder_type = array_search('post',config('custom.image_folders')); //for image saved in folder
            $count = rand(100,999);
            $out_put_path = User::save_image(\request('featured_image'),$extension,$count,$image_folder_type);


            if (is_file(public_path().'/'.$post->featured_image) && file_exists(public_path().'/'.$post->featured_image)){
                unlink(public_path().'/'.$post->featured_image);
            }
           is_array($out_put_path) ? $post->featured_image = $out_put_path[0] : $post->featured_image = $out_put_path;


        }


        $post->update();
        return redirect('admin/posts')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findorfail($id);
        if (is_file(public_path().'/'.$post->featured_image) && file_exists(public_path().'/'.$post->featured_image)){
            unlink(public_path().'/'.$post->featured_image);
        }
        $post->delete();
        return redirect('admin/posts')->with('success', 'Post deleted successfully!');
    }
}
