@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div  class="table  table-striped" style="margin-bottom: 150px; min-height: 300px;">

  <!-- support-section start -->
    <div class="col-xl-12 col-md-12 pt-5">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="material-icons-two-tone text-primary mb-1" style="background-color: #ed563b;">group</i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$total_user}}</h5>
                            <span>Khách hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="material-icons-two-tone text-primary mb-1" style="background-color: #ed563b;">monetization_on</i>
                        </div>

                        @php
                        $total = 0;
                        $totalMoney = 0;
                           foreach ($orders as $order)
                           {

                                $totalMoney= $order->total;
                                $total += $totalMoney;
                           }
                        @endphp

                        <div class="col-sm-8 text-md-center">
                            <h5>{{number_format($total)}} VNĐ</h5>
                            <span>Tổng doanh thu</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="material-icons-two-tone text-primary mb-1" style="background-color: #ed563b;">shopping_cart</i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$total_order}}</h5>
                            <span>Tổng đơn hàng</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card flat-card">
                <div class="row-table">
                    <div class="col-sm-6 card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1" style="background-color: #ed563b;">card_giftcard</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>{{$order_shipper}}</h5>
                                <span>Đơn hàng đang đi giao</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1" style="background-color: #ed563b;">language</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>{{$order_finish}}</h5>
                                <span>Đơn hàng đã hoàn thành</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1" style="background-color: #ed563b;">unarchive</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>{{$order_cancel}}</h5>
                                <span>Đơn hàng đã hủy</span>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <h1>Top các các sản phẩm bán chạy</h1>
                    </div>
                    <table id="post"  class="table table-bordered table-hover table-striped">
                        <thead class="thead-dark">
                            <tr class="center">
                           
                                <th scope="col">Số thứ tự</th>
                                <th scope="col">Tên sản phẩm</th>
                                {{-- <th scope="col">Tên đường truyền</th> --}}
                                <th scope="col">Ảnh</th>
                                <th scope="col">giá</th>
                                <th scope="col">Số lượng sản phẩm đã bán</th>
                            </tr>
                        </thead class="thead-light">
                        <tbody>
                            @foreach ($products as  $product)
                                @foreach ($totalOrder as $key => $item)
                                    @if ($product->id==$item->id)
                                    <tr>
                                        <td scope="col">{{ $key+1 }}</td>
                                        <td scope="col">{{ $product->name }}</td>
                                        <td>
                                            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->product_name }}" class="img-flid" style="width:100px">
                                        </td>
                                        <td scope="col">{{ number_format($product->money)}} VNĐ</td>
                                        <td scope="col">{{$item->total_product}}</td>
                                        @endif
                                        @endforeach
                                    @endforeach
                                </tbody>

                            </table>
                                    </div>
               
            </div>

    </div>

        {{-- <div class="row">
            <div class="col-md-6">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0">53.94%</h2>
                        <span class="text-primary">Conversion Rate</span>
                        <p class="mb-3 mt-3">Number of conversions divided by the total visitors. </p>
                    </div>
                    <div id="support-chart"></div>
                    <div class="card-footer border-0 bg-primary text-white background-pattern-white">
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="m-0 text-white">10</h4>
                                <span>2018</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">15</h4>
                                <span>2017</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">13</h4>
                                <span>2016</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0">1432</h2>
                        <span class="text-primary">Order delivered</span>
                        <p class="mb-3 mt-3">Total number of order delivered in this month.</p>
                    </div>
                    <div class="card-footer border-0">
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="m-0">130</h4>
                                <span>May</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0">251</h4>
                                <span>June</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 ">235</h4>
                                <span>July</span>
                            </div>
                        </div>
                    </div>
                    <div id="support-chart1"></div>
                </div>
            </div>
        </div> --}}
    </div>
    {{-- <div class="col-xl-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Department wise monthly sales report</h5>
            </div>
            <div class="card-body">
                <div class="row pb-2">
                    <div class="col-auto m-b-10">
                        <h3 class="mb-1">$21,356.46</h3>
                        <span>Total Sales</span>
                    </div>
                    <div class="col-auto m-b-10">
                        <h3 class="mb-1">$1935.6</h3>
                        <span>Average</span>
                    </div>
                </div>
                <div id="account-chart"></div>
            </div>
        </div>
    </div> --}}
    <!-- support-section end -->
    <!-- customer-section start -->
    {{-- <div class="col-xl-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h6>Customer Satisfaction</h6>
                <span>It takes continuous effort to maintain high customer satisfaction levels Internal and external.</span>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col">
                        <div id="satisfaction-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    </div>
</div>
@endsection

