@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
<div  class="table  table-striped" style="margin-bottom: 150px; min-height: 300px;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <table id="category-list" class="table">
        <thead class="thead-dark">
            <tr class="center">
                <th>Số thứ tự</th>
                <th>Tên thể loại</th>
                <th>Slug</th>
                <th colspan="3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($categories))
                @foreach ($categories as $key => $category)
                    <tr>
                        <td scope="row">{{ $key+1 }}</td>
                        <td scope="row">{{ $category->category_name }}</td>
                        <td scope="row">{{$category->category_slug}}</td>
                        <td scope="row"><a href="{{route('category.edit',$category->category_id)}}"><i class="fa fa-pencil-square-o" style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a></td>
                        <td>
                            <form action="{{ route('category.destroy', $category->category_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none;background:none"><i class="fa fa-trash-o" aria-hidden="true" style="padding:20px;font-size:20px;color:black; "></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
    {{-- {{ $categories->links() }} --}}
@endsection
