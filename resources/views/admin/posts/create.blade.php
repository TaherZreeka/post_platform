@extends('layouts.app')
@section('title', 'إضافة منشور جديد')
@section('content')
<div class="container">
    <h1>إضافة منشور جديد</h1>

    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="title">العنوان</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="content">المحتوى</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5"
                required>{{ old('content') }}</textarea>
            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="is_archived">حالة الأرشيف</label>
            <select class="form-control @error('is_archived') is-invalid @enderror" id="is_archived" name="is_archived">
                <option value="0" {{ old('is_archived')==0 ? 'selected' : '' }}>غير مؤرشف</option>
                <option value="1" {{ old('is_archived')==1 ? 'selected' : '' }}>مؤرشف</option>
            </select>
            @error('is_archived')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection
