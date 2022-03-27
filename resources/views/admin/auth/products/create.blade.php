@extends('admin.layouts.app')
@section('title', 'Create Post')
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-create.css">
    @endpush
@section('content')
<style type="text/css">
.color_id
{
    width: 500px;
}
</style>
    <h1>Create Product</h1>
    @include('errors.error')
    @if ($errors->any())
    <?php echo implode('', $errors->all('<div>:message</div>')); ?>
    @endif
    <br>
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5">
            <label for="">product Name</label>
            <input type="text" name="name" placeholder="product name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">product Slug</label>
            <input type="text" name="slug" placeholder="product slug" value="{{ old('slug') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">product Code</label>
            <input type="text" name="code" placeholder="product code" value="{{ old('code') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
   
        <div class="form-group mb-5">
            <label for="">Post Content</label>
            <textarea name="content" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        
        <div class="form-group mb-5">
            <label for="">Post Description</label>
            <textarea name="description" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Product Money</label>
            <div class="border p-5">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-2">
                            <label for="">Money</label>
                            <input type="number" name="money" class="form-control" placeholder="">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Status</label>
                            <div>
                                <input type="radio" name="price_status" value="0" checked id="price-status-0">
                                <label for="price-status-0">Private</label>
                                <input type="radio" name="price_status" value="1" id="price-status-1">
                                <label for="price-status-1">Public</label>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-6">
                        <div class="form-group mb-2">
                            <label for="">Begin Date</label>
                            <input type="date" name="begin_date" placeholder="YYYY-mm-dd" class="datepicker form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">End Date</label>
                            <input type="date" name="end_date" placeholder="YYYY-mm-dd" class="datepicker form-control">
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="form-group mb-5">
            <label for="">Quantity</label>
            <input type="number" name="quantity" placeholder="quanntity" value="{{ old('quantity') }}" class="form-control">
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5" class="form-control">
            <label for="">Category Name</label>
            <select name="category_id" class="form-control">
                <option value=""></option>
                @if (!empty($categories))
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}" {{ old('category_id') == $categoryId ? 'selected' : ' ' }}>
                            {{ $categoryName }}</option>
                    @endforeach
                @endif
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Post Thumbnail</label>
            <input type="file" name="thumbnail" placeholder="post thumbnail" class="form-control">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Post</a>
            <button class="btn btn-primary" type="submit">create</button>
        </div>
    </form>
@endsection
