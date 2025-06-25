@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="container">
    <h1>إدارة المنشورات</h1>

    <div class="mb-4">
        <form method="GET" action="{{ route('admin.posts.index') }}">
            <div class="row">

                <div class="col-md-3">
                    <select name="user_id" class="form-control">
                        <option value=""> المستخدمين</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ request('user_id')==$user->id ? 'selected' : '' }}>{{
                            $user->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>العنوان</th>
                <th>الكاتب</th>
                <th>التاريخ</th>
                <th>أرشيف</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                <td>{{ $post->is_archived ? 'نعم' : 'لا' }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>
@endsection
