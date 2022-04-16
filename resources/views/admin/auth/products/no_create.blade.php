@extends('admin.layouts.app')
@section('title', 'Create Post')
@push('css')
    <link rel="stylesheet" href="/css/categories/category-create.css">
@endpush
@section('content')
    <style type="text/css">
        .color_id {
            width: 500px;
        }
    </style>
            
    <h1>
        no category yet please create category</h1>
    <br>

        <div class="form-group">
            <a href="{{ route('admin.category.create') }}" class="btn btn-secondary">create category</a>
        </div>
    </form>

   
@endsection 
