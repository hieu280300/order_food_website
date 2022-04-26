@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
<div class="table  table-striped" style="margin-bottom: 150px; min-height: 300px;" >
      <div class="row mt-5 justify-content-center align-items-center">
        <div class="col col-lg-8 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="row g-0">
                @if (!empty($infoUsers))
                @foreach ($infoUsers as $info)
              <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

                <img
                src="{{$info->shops->image}}"
                alt="Avatar"
                class="img-fluid my-5"
                style="  clip-path: circle(50%);
                width: 150px; height: 150px"
              />

                <h5>{{ $info->shops->name }}</h5>
                <p class="text-muted">{{$info->shops->address}}</p>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <h6>Information</h6>
                  <hr class="mt-0 mb-4">
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Name Manager Shop</h6>
                      <p class="text-muted">{{ $info->name }}</p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Phone</h6>
                      <p class="text-muted">{{$info->phone }}</p>
                    </div>
                  </div>
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Gender</h6>
                      @if ( $info->gender  == \App\Models\User::GENDER[0])
                      <p class="text-muted">Male</p>
                      @elseif ($info->gender == \App\Models\User::GENDER[1])
                      <p class="text-muted">Female</p>
                      @endif
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Adress</h6>
                      <p class="text-muted">{{$info->shops->address}}</p>
                    </div>
                  </div>
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Time Open</h6>
                      <p class="text-muted">{{$info->shops->time_open}}</p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Time Close</h6>
                      <p class="text-muted">{{$info->shops->time_close}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
  @endforeach
  @endif
@endsection
