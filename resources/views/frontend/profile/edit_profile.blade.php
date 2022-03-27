@extends('frontend.layouts.master')
@section('title','Cart')
@push('css')
@endpush
@section('content')
<style>
    body{margin-top:20px;}		
    </style>
    
<div class="container bootstrap snippets bootdey">
  
    <h1 class="text-primary"><span class="glyphicon glyphicon-user"></span>Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      {{-- <div class="col-md-3">
      
      </div>
       --}}
      <!-- edit form column -->
      <div class="col-md-12 personal-info">
        
        <h3>Personal info</h3>
        <form class="form-horizontal" role="form" action="{{ route('update_profile',$info_users->id) }}" method="post">
        @csrf
          <div class="form-group">
            <label class="col-lg-3 control-label"> Name:</label>
            <div class="col-lg-6">
              <input class="form-control" name="name" type="text" value="{{ Auth::user()->name }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-6">
              <input class="form-control" name="phone" type="text" value="{{ Auth::user()->phone }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-6">
              <input class="form-control" name="address" type="text" value="{{ Auth::user()->address }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-6">
              <input class="form-control" name="email" type="text" value="{{ Auth::user()->email }}">
            </div>
          </div>
    
          <input type="submit" class="btn btn-primary" value="Lưu" style="margin-left:500px">
     
        </form>
      </div>
  </div>
</div>
<hr>
@endsection