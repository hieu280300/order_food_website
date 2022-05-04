@extends('admin.layouts.app')

@section('title', 'List Category')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/css/categories/category-list.css">
    
@endpush

@section('content')
    {{-- <p><a href="{{ route('admin.category.create') }} " class="btn btn-secondary">Tạo</a></p> --}}
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <table id="category-list" class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Tên thể loại</th>
                <th>Slug</th>
                {{-- <th colspan="3">Hành động</th> --}}
            </tr>
        </thead>
        <tbody>
            @if(!empty($categories))
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{$category->category_slug}}</td>
                        {{-- <td><a href="{{route('admin.category.edit',$category->category_id)}}"><i class="fa fa-pencil-square-o" style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a></td>
                        <td>
                            <form action="{{ route('admin.category.destroy', $category->category_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none;background:none"  onclick="return confirm('Bạn muốn xóa thể loại này?')"><i class="fa fa-trash-o" aria-hidden="true" style="padding:20px;font-size:20px;color:black; "></i></button>

                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{-- {{ $categories->links() }} --}}
@endsection
