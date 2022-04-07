@extends('admin.layouts.app')

@section('title', 'List Category')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/css/categories/category-list.css">
@endpush

@section('content')
    {{-- form search --}}

    {{-- create category link --}}
    {{-- case 1 --}}
    <p><a href="{{ route('admin.category.create') }} " class="btn btn-secondary">Create</a></p>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <table id="category-list" class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Category Slug</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($categories))
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{$category->category_slug}}</td>
                        <td><a href=""><input type="submit" name="submit" value="Detail" class="btn btn-info"></a></td>
                        <td><a href="{{route('admin.category.edit',$category->category_id)}}"><input type="submit" name="submit" value="Edit" class="btn btn-success"></a></td>
                        <td>
                            <form action="{{ route('admin.category.destroy', $category->category_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure DELETE Category?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{-- {{ $categories->links() }} --}}
@endsection