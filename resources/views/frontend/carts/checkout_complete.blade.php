@extends('frontend.layouts.master')
@section('title', 'Home')

@push('css')
@endpush
@section('content')


    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="{{asset('frontend/assets/images/video.mp4')}}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">

                <h2>Best <em>Food stores</em> in town</h2>
                {{-- <div class="main-button">
                    <a href="contact.html">Contact us</a>
                </div> --}}
            </div>
        </div>
    </div>
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Thank <em>You</em></h2>
                        <h3>Bạn đã đặt hàng thành công !!!</h3>
                        <p>Cảm ơn bạn vì đã ủng hộ shop. Đơn hàng của bạn sẽ nhanh chóng đến tay của bạn<p>
                    </div>
                </div>
            </div>
            <div class="main-button text-center">
                <a href="{{url('/')}}">Quay trở lại</a>
            </div>
        </div>
    </section>
@endsection

