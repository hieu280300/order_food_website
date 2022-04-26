@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')  
<div  class="table  table-striped">
 
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
                        <td>
                            <a href=""><i class="fa fa-info-circle"  style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a></td>
                        <td><a href="{{route('category.edit',$category->category_id)}}"><input type="submit" name="submit" value="Edit" class="btn btn-success"></a></td>
                        <td>
                            <form action="{{ route('category.destroy', $category->category_id) }}" method="post">
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
</div>
    {{-- {{ $categories->links() }} --}}
@endsection