@extends('admin.layouts.app')
@section('title', 'Create category')
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-create.css">
    @endpush
@section('content')

    <h1>Create Category</h1>
    <br>
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        success
        @if ($errors->any())
        <?php echo implode('', $errors->all('<div>:message</div>')); ?>
    @endif
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" name="category_name" placeholder="category name">
            <br>
            <br>
            <label for="">Category Slug  </label>
            <input type="text" name="category_slug" placeholder="category slug">
        </div>
        <br>
        <div class="form-group">

            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">List category</a>
            <button class="btn btn-primary" type="submit">create</button>
        </div>
    </form>
@endsection
