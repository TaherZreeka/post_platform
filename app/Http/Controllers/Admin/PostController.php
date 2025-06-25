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

}
