@extends('admin.layouts.app')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'List Post')
@section('content')
{{-- @include('admin.auth.products.search') --}}
<p><a href="{{ route('admin.user.create') }}" class="btn btn-secondary" >Tạo</a></p>

@if(session()->has('sucess_create_user'))
<div class="alert alert-success">
    {{ session()->get('sucess_create_user') }}
</div>
@endif
@if(session()->has('success_delete_user'))
<div class="alert alert-success">
    {{ session()->get('success_delete_user') }}
</div>
@endif
    <br>
    <table id="post"  class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Số thứ tự</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ảnh đại diện</th>
                <th scope="col" colspan="3">Hành động</th>
            </tr>
        </thead class="thead-light">
        <tbody>
            @if (!empty($users))
                @foreach ($users as $key => $user)
                    <tr>
                        <td scope="col">{{ $key+1 }}</td>
                        <td scope="col">{{ $user->user_name }}</td>
                        <td scope="col">{{ $user->user_email }}</td>
                        <td> @if ( $user->user_gender  == \App\Models\User::GENDER[0])
                            <div class="alert alert-secondary" role="alert">Nam</div>
                              @elseif ($user->user_gender == \App\Models\User::GENDER[1])
                            <div class="alert alert-primary" role="alert">Nữ</div>
                          @endif</td>
                        <td scope="col">
                            <img src="{{asset( $user->user_avatar)}}" alt="" style="width:100px">
                         </td>
                        <td>
                            <a href="{{ route('admin.user.show', $user->user_id) }}"><i class="fa fa-info-circle" aria-hidden="true" style="padding:20px;font-size:20px;color:black"></i></a></td>
                        <td scope="col"><a href="{{route('admin.user.edit',$user->user_id)}}"><i class="fa fa-pencil-square-o" style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a> </td>
                        <td>
                            <form action="{{route('admin.user.destroy',$user->user_id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" style="border: none;background:none"  onclick="return confirm('Bạn có muốn xóa người dùng này?')"><i class="fa fa-trash-o" aria-hidden="true" style="padding:20px;font-size:20px;color:black; "></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$users->links() }}
@endsection
