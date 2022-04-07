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
                <th scope="col"> Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Avatar</th>
                <th scope="col" colspan="3">Action</th>
            </tr>
        </thead class="thead-light">
        <tbody>
            @if (!empty($users))
                @foreach ($users as $key => $user)
                    <tr>
                        <td scope="col">{{ $key+1 }}</td>
                        <td scope="col">{{ $user->user_name }}</td>
                        <td scope="col">{{ $user->user_email }}</td>
                        <td scope="col">{{ $user->user_gender }}</td>
                        <td scope="col">{{ $user->user_avatar}}</td>
                       

                        <td>
                            <a href="{{ route('admin.user.show', $user->user_id) }}"><input type="submit" name="submit" value="Detail" class="btn btn-info"></a></td>
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
