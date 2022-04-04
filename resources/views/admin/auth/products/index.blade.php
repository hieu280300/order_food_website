@extends('admin.layouts.app')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'List Post')
@section('content')
@include('admin.auth.products.search')
<p><a href="{{ route('admin.product.create') }}" class="btn btn-secondary" >Create</a></p>
        
        {{-- show message --}}
    
    <br>
    <table id="post"  class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Slug</th>
                <th scope="col">Code</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Money</th>
                <th scope="col">Description</th>
                <th scope="col">Content</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category Name</th>
                <th scope="col" colspan="3">Action</th>
            </tr>
        </thead class="thead-light">
        <tbody>
            @if (!empty($products))
                @foreach ($products as $key => $product)
                    <tr>
                        <td scope="col">{{ $key+1 }}</td>
                        <td scope="col">{{ $product->product_name }}</td>
                        <td scope="col">{{ $product->product_slug }}</td>
                        <td scope="col">{{ $product->product_code}}</td>
                        <td>
                            <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name }}" class="img-flid" style="width:100px">
                        </td>
                        <td scope="col">{{ number_format($product->product_money)}} VNĐ</td>
                        <td scope="col">{{ $product->product_description }}</td>
                        <td scope="col">{{ $product->product_content }}</td>
                        <td scope="col">{{ $product->product_quantity }}</td>
                        <td scope="col">{{ $product->category_name }}</td>
                       
                        {{-- <td scope="col">{{$posts->}}</td> --}}

                        <td>
                            <a href=""><input type="submit" name="submit" value="Detail" class="btn btn-info"></a></td>
                        <td scope="col"><a href=""><input type="submit" name="submit" value="Edit" class="btn btn-success"></a> </td>
                        <td>
                            <form action="" method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure DELETE Product?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
