<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.post.';
    public function index(Request $request)
    {
        //
        $keyword = $request->input('keyword');
        $categories = Category::all();
        $data = Post::with('category')
            ->orderByDesc('id')
            ->where('title', 'like', "%$keyword%")
            ->orWhere('short_content', 'like', "%$keyword%")
            ->orWhere('content', 'like', "%$keyword%")
            ->get();
        // dd($data);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $post = $request->all();
        $post['user_id'] = Auth()->user()->id;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $post['image'] = $path;
        }
        // dd($request);
        Post::create($post);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post=Post::findOrFail($id);
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $post->image = $path;
            // dd($post->image);
        }
        // dd($post);
        $post->update($request->except('image'));
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        return back();
    }
}
