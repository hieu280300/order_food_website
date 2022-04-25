@extends('admin.layouts.app')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'Detail User')
@section('content')
    <h1>Detail User</h1>
    <form action="">
        <table id="post" class="table">
            @foreach ($user as $shop)
            <thead class="thead-dark">
                <tr>
                    <th scope="col">User Name</th>
                    @if($shop->user_role == 0)
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Hành động</th>
                    @else
                    <th scope="col">Name Shop</th>
                    <th scope="col">Adress Shop</th>
                    <th scope="col">Image Shop</th>
                    <th scope="col" colspan="3">Hành động</th>
                    @endif
                </tr>

                </tr>
            </thead>
            <tbody>

                <tr>

                    <td cope="col">{{$shop->user_name}}</td>
                    @if($shop->user_role == 0)
                        <td scope="col">{{$shop->user_email}}</td>
                        <td scope="col">{{$shop->user_password}}</td>
                        <td scope="col"><a href=""><input type="submit" name="submit" value="Orders" class="btn btn-danger"></a></td>
                    @else
                    <td scope="col">{{ $shop->shop_name }} </td>
                    <td scope="col">{{ $shop->shop_address }}</td>

                    <td scope="col">   <img src="{{ asset($shop->shop_image)}}" alt="" class="img-flid" style="width:100px"></td>
                    <td>
                        <a href="{{ route('admin.category.show', $shop->shop_id) }}" name="submit" class="btn btn-info">Categories</a></td>
                    <td scope="col">  <a href="{{ route('admin.product.show', $shop->shop_id) }}" name="submit" class="btn btn-info">Products</a></td></td>
                    <td scope="col"><a href=""><input type="submit" name="submit" value="User Orders" class="btn btn-danger"></a> </td>
                    @endif

                    @endforeach
                </tr>
            </tbody>
        </table>
    </form>
    <div class="form-group">
        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">List User</a>
    </div>
    @endsection
