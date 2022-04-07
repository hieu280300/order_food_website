
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}
 .search-container button{
    /* float: right; */
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
  }
.search{

    padding: 6px 10px;
    margin-bottom: 15px;
    margin-right: 5px;
    font-size: 19px;
    width: 200px;
} 
  
  .search-container button:hover {
    background: #ccc;
  }
  
  @media screen and (max-width: 600px) {
    .search-container {
      float: none;
    }
     .search-container button {
      float: none;
      display: block;
      /* text-align: left; */
      width: 100%;
      margin: 0;
      padding: 14px;
    }
    .search-container input[type=text] {
      border: 1px solid #ccc;  
    }
  }
</style>
<div class="container">
    <div class="row">
        <div class="mb-5 mt-5 border p-3">
            <form action="{{ route('shop') }}" method="GET">
                <div class="header_left floatleft search-container ">
                    <input type="text" name="name" class="search" placeholder="Search..." value="{{ request()->get('name') }}">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="header_center">
                <a href="index.html"><img src="/images/frontend/logo.png" alt="Site Logo" /></a>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="header_right floatright">
                <ul class="checkout">
                    <li><a href="{{route('manage_order')}}"><i class="fa fa-shopping-cart"></i>Quản lý đơn hàng</a></li>
                    <li class="mobi_right_li"><a href="{{route('checkout')}}"><i class="fa fa-credit-card-alt"></i>Thanh Toán</a></li>
                </ul>
                <div class="w_likes">
                    <span>3</span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>