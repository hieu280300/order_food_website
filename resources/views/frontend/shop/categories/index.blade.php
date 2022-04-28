@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
<div  class="table  table-striped" style="margin-bottom: 150px; min-height: 300px;">
    <br>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    
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
                                <button type="submit" style="border: none;background:none"  onclick="return confirm('Bạn muốn xóa thể loại này?')"><i class="fa fa-trash-o" aria-hidden="true" style="padding:20px;font-size:20px;color:black; "></i></button>

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
