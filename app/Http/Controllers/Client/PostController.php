<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'client.';
    public function index(Request $request)
    {
        $search = $request->search;
        $categories = Category::whereNot('status', 'inactive')
            ->get();
        $data = Post::orderByDesc('views')
            ->whereHas('category', function ($query) {
                $query->where('status', '!=', 'inactive');
            })
            ->paginate(10);
        $latestNews = Post::orderByDesc('id')
            ->where('title', 'like', "%$search%")
            ->whereHas('category', function ($query) {
                $query->where('status', '!=', 'inactive');
            })
            ->paginate(10);
        // dd($categories);
        // $date = $data->created_at->format('Y-m-d');
        return view(self::PATH_VIEW . __FUNCTION__, compact('data', 'latestNews', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function post_comment(Request $request, $postID)
    {
        $data = $request->all();
        if (isset($data['content'])) {
            $data['post_id'] = $postID;
            $data['user_id'] = Auth()->user()->id;
            // dd($data);
            Comment::create($data);
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::whereNot('status', 'inactive')->get();
        $post = Post::findOrFail($id);
        $post->views++;
        $post->save();

        $data = Post::where('category_id', $post->category_id)
            ->orderByDesc('views')
            ->paginate(10);
        // dd($data);

        $latestNews = Post::orderByDesc('id')->paginate(5);
        $similarArticles = Post::where('category_id', $post->category_id)->limit('3')->get();
        $comment = Comment::with('user')->where('post_id', $id)->get();
        // dd($comment);
        $date = $post->created_at->format('Y-m-d');

        return view('client.news-detail', compact('data', 'latestNews', 'categories', 'post', 'similarArticles', 'comment', 'date'));
    }

    public function showByCategory(string $id)
    {
        $categories = Category::whereNot('status', 'inactive')->get();
        $category = Category::findOrFail($id);
        // dd($category->name);
        $data = Post::where('category_id', $id)
            ->orderByDesc('views')
            ->paginate(10);
        $latestNews = Post::with('category')
            ->orderByDesc('id')
            ->where('category_id', $category->id)
            ->paginate(5);
        return view('client.index', compact('data', 'latestNews', 'categories', 'category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
