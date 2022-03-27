<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <form  method="post" action="{{route('checkout_complete')}}">
        @csrf
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
          <!--REVIEW ORDER-->
          <div class="panel panel-info">
            <div class="panel-heading">Address</div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-12">
                        <h4>Shipping Address</h4>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <strong>Họ và tên:</strong>
                        {{$info['first_name']}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                    {{$info['address']}}
                </div>
                <div class="form-group">
                    <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                    {{$info['phone_number']}}
                   
                </div>
                <div class="form-group">
                    <div class="col-md-12"><strong>Email Address:</strong></div>
                    {{$info['email_address']}}
                </div>
                
            </div>
        </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình ảnh sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Size</th>
            <th scope="col">Màu</th>
            <th scope="col">Gía</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach (Cart::content()  as $item)
            <th scope="row">1</th>
            <td>{{$item->name}}</td>
            <td><img src="{{$item->options->image }}" alt="" style="width:150px"></td>
            <td>{{$item->qty}}</td>
            <td>{{$item->options->product_size}}</td>
            <td>{{$item->options->product_color}}</td>
            <td>{{number_format($item->price)}} VNĐ</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </form>
   