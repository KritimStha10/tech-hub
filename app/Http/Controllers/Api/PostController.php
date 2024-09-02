<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->paginate(10);
        return response()->json($posts);
    }

    public function show($id)
    {
        $post = Post::with('category')->findOrFail($id);
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $post = Post::create($validated);
        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $post->update($validated);
        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function fetchExternalNews()
    {
        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'apiKey' => config('services.newsapi.key'),
            'category' => 'technology',
            'language' => 'en',
        ]);

        if ($response->successful()) {
            $news = $response->json()['articles'];
            return response()->json($news);
        }

        return response()->json(['error' => 'Unable to fetch news'], 500);
    }
}
