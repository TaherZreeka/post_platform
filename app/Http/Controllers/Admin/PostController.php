<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $query = Post::query();

        // فلترة حسب الكاتب
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // فلترة حسب العنوان
        if ($request->has('title')) {
            $query->where('title', 'like', '%'.$request->title.'%');
        }

        // ترتيب حسب التاريخ
        if ($request->has('sort')) {
            $query->orderBy('created_at', $request->sort === 'oldest' ? 'asc' : 'desc');
        } else {
            $query->latest();
        }

        $posts = $query->paginate(10);
        $users=User::all();
        return view('admin.posts.index', compact('posts','users'));
    }
    public function create(){
        return view('admin.posts.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'is_archived' => 'required|boolean',
    ]);

    $post = new Post();
    $post->title = $validatedData['title'];
    $post->content = $validatedData['content'];
    $post->is_archived = $validatedData['is_archived'];
    $post->user_id = auth()->id();

    $post->save();

    return redirect()->route('admin.posts.index')
        ->with('success', 'تم إضافة المنشور بنجاح');
}

public function edit(Post $post)
{
    return view('admin.posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'is_archived' => 'required|boolean',
    ]);

    $post->title = $validatedData['title'];
    $post->content = $validatedData['content'];
    $post->is_archived = $validatedData['is_archived'];
    $post->save();

    return redirect()->route('admin.posts.index')
        ->with('success', 'تم تحديث المنشور بنجاح');
}
public function destroy(Post $post)
{

    $post->delete();

    return redirect()->route('admin.posts.index')
        ->with('success', 'تم حذف المنشور بنجاح');
}
}
