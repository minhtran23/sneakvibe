@extends('pages.layout')

@section('title')

     Trang cá nhân
    
@endsection

@section('content')

<div id="PageContainer" class="is-moved-by-drawer">
    <main class="main-content" role="main">
        <div class="container p-0">


            <div class="breadcrumb-product">
                <ul class="py-2 px-0 nav justify-content-center">
                   
                    <li><span>Quản lý đơn hàng</span></li>
                </ul>
            </div>


<!--            <div class="row">-->
<!--            <div class="col-xs-12 col-sm-12 col-md-12">-->
                <div id="parent" class="row py-3">
                    <div id="a" class="col-12 col-xl-9">
                        
                                                <div class="col-12 ">
                            <div class="my-account">
                                <div class="dashboard">
                                    <div class="recent-orders">
                                        <div class="table-responsive "style="overflow-x:auto;">
                                            <table class="table table-cart" id="my-orders-table">
                                                <thead class="thead-default">
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Thông tin đơn hàng</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                                </thead>
                                               
                                                {{-- <tbody>
                                                     @foreach ($auth->order as $item)
                                                        <tr class="orderItem first odd">
                                                        
                                                        @foreach ($item->details as $list)
                                                            
                                                        
                                                        <td style="text-align: center">{{$loop->index+1}}</td>
                                                        <td>
                                                                <div class="orderProductInfo">
                                                                    <a href="">
                                                                        <img class="lazyload" data-sizes="auto" src="{{asset('/uploads/product/'.$list->image)}}"
                                                                             data-src="" alt="" title="" width="100">
                                                                    </a>
                                                                    <p><b>{{$list->name_sp}} - {{$list->size}}</b></p>

                                                                    <p>Số lượng: <b>{{$list->quantity}}</b></p>

                                                                    <p>Đơn giá: <b>{{number_format($list->price)}}VNĐ</b></p>
                                                                    <span class="clearfix"></span>
                                                                </div>
                                                        </td>
                                                        @endforeach
                                                           
                                                       
                                                        <td>
                                                            <p>- Ngày mua: {{$item->created_at->format('d/m/Y')}}</p>

                                                            <p>- Người nhân: {{$item->name}}</p>

                                                            <p>- Email: {{$item->email}}</p>

                                                            <p>- SĐT: {{$item->phone}}</p>
                                                        </td>
                                                        <td style="text-align: center">
                                                            @if($item->status == 0)
                                                                <p>Chưa xác nhận</p>
                                                            @else
                                                                <p>Đã xác nhận</p>
                                                            @endif
                                                        </td>
                                                        
                                                    </tr>
                                                </tbody> --}}
                                                 <tbody>
                
                                                  @foreach ($auth->order as $item)
                                                    

                                                      <tr class="orderItem first odd">
                                                        <td style="text-align: center">{{$loop->index+1}}</td>
                                                        <td>
                                                            @foreach ($item->details as $list)
                                                                 <div class="orderProductInfo">
                                                                <a href="">
                                                                    <img class="lazyload" data-sizes="auto" src="{{asset('/uploads/product/'.$list->image)}}" alt="" width="100">
                                                                </a>
                                                                <p><b>{{$list->name_sp}} {{$list->size}}</b></p>

                                                                <p>Số lượng: <b>{{$list->quantity}}</b></p>

                                                                <p>Đơn giá: <b>{{number_format($list->price,0,',')}}đ</b></p>
                                                                 <p>Thành tiền: <b>{{number_format($list->price * $list->quantity,0,',')}}đ</b></p>
                                                                    <span class="clearfix"></span>
                                                            </div>
                                                            @endforeach
                                                           
                                                        </td>
                                                        <td>
                                                            <p>- Ngày mua: {{$item->created_at->format('d/m/Y')}}</p>

                                                          

                                                            <p>- Thông tin nhận hàng:
                                                                <br>
                                                                <span style="padding-left: 10px; color:blueviolet">
                                                                     .{{$item->name}}
                                                                </span>
                                                                <br>
                                                                <span style="padding-left: 10px; color:blueviolet">
                                                                     .{{$item->email}}
                                                                </span>
                                                                <br>
                                                                <span style="padding-left: 10px; color:blueviolet">
                                                                     .{{$item->phone}}
                                                                </span>
                                                                <br>
                                                                 <span style="padding-left: 10px; color:blueviolet">
                                                                     .{{$item->address}}
                                                                </span>
                                                             </p>

                                                            <p>- Ghi chú: {{$item->note}} </p>
                                                        </td>
                                                        <td style="text-align: center">
                                                            <p style="padding-top: 7px;">
                                                                @if ($item->status ==0)
                                                                     Chưa xác nhận
                                                                    
                                                                @elseif($item->status == 1)
                                                                    Đã xác nhận
                                                                @elseif($item->status == 2)
                                                                    Đã thanh toán
                                                                @else
                                                                    Đã Hủy
                                                                @endif
                                                            </p>
                                                        </td>
                                                        <td style="text-align: center">
                                                            <a class="btnProf btn btn-default delOrderBtn border" id="cancelOrder" rel="366555123" href="javascript:void(0)" >Hủy</a>                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td>Tổng tiền thanh toán:</td>
                                                        <td colspan="3" class="footer-table text-right"><b>{{number_format($item->total_amount,0,',')}}đ</b></td>
                                                    </tr>
                                                   
                                               @endforeach
                                                </tbody>
                                               
                                                
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                            </div>

                    <div id="b" class="col-12 col-xl-3">
                        <div class="page-title mx991">
                            <h1 class="title-head"><a href="#">Tài khoản</a></h1>
                        </div>
                        <div class="block-account" style="padding-top: 10px;">
                            <div class="block-content form-signup">
                                <p>
                                    <!--<i class="fa fa-home font-some" aria-hidden="true"></i>Địa chỉ: -->                                    <a href="/profile" style="color: #000;">Thông tin tài khoản</a>
                                </p>

                                <p><a href="javascript:" class="text-primary" style="cursor: not-allowed;">Quản lý đơn hàng</a></p>

                                <p><a href="/user/signout" style="color: #000;">Đăng xuất</a></p>

                                <!--<p><i class="fa fa-mobile font-some" aria-hidden="true"></i> Điện thoại: --><!--</p>-->
                                <!--<p><i class="fa fa-map-marker font-some" aria-hidden="true"></i>  Địa chỉ 1: </p>-->
                                <!--<p><i class="fa fa-yelp font-some" aria-hidden="true"></i>  Ngày sinh: --><!-- </p>-->
                                <!--<p><i class="fa fa-plane font-some" aria-hidden="true"></i>  Quốc gia :</p>-->
                                <!--<p><i class="fa fa-code font-some" aria-hidden="true"></i>  Zip code: </p>-->
                            </div>
                        </div>
                    </div>

                </div>
<!--            </div>-->
<!--        </div>-->
    </div>
    </main>
</div>
    
@endsection