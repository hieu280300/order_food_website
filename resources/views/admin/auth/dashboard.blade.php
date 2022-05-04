@extends('admin.layouts.app')
@section('content')
@if(session()->has('admin'))
<div class="alert alert-success">
    {{ session()->get('admin') }}
</div>
@endif
  <!-- support-section start -->
    {{-- <div class="col-xl-6 col-md-12"> --}}
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="material-icons-two-tone text-primary mb-1">group</i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$users}}</h5>
                            <span>Khách hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="material-icons-two-tone text-primary mb-1">language</i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$shops}}</h5>
                            <span>Cửa hàng</span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="card flat-card">
                <div class="row-table">
                    <div class="col-sm-6 card-body br">
                        <div class="row">
                            <h1>Cửa hàng vừa đăng kí</h1>
                        </div>
                        <table id="post"  class="table table-bordered table-hover table-striped">
                            <thead class="thead-dark">
                                <tr class="center">
                               
                                    <th scope="col">Số thứ tự</th>
                                    <th scope="col">Tên cửa hàng</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Ảnh</th>
                                </tr>
                            </thead class="thead-light">
                            <tbody>
                                @foreach ($top_shop as $key=>  $shop)
                                        <tr>
                                            <td scope="col">{{ $key+1 }}</td>
                                            <td scope="col">{{ $shop->name }}</td>
                                            <td scope="col">{{$shop->address}}</td>
                                            <td>
                                                <img src="{{ asset($shop->image) }}" alt="{{ $shop->name }}" class="img-flid" style="width:100px">
                                            </td>
                                        @endforeach
                                    </tbody>
    
                                </table>
                                        </div>
                   
                </div>
    
        </div>
            </div>
        </div>
    </div>
    <!-- customer-section end -->
@endsection
