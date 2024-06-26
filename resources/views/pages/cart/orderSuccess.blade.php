@extends('pages.layout')

@section('title')
    Giỏ Hàng
@endsection

@section('content')
<style>
    .oder-confirm{
        margin-left: 400px;
        margin-right: 400px;
        margin-top: 50px;
    }
    .order-confirm-content{
        padding: 20px 12px;
        background-color: rgb(212, 208, 208);
        border: 2px solid  rgb(212, 208, 208);
        margin-top: 20px;
}
</style>
<section class="oder-confirm p-to-top">
    <div class="row-flex row-flex-product-openssl_pkey_get_details">
        <p>Xác nhận đơn hàng thành công</span></p>
    </div>
    <div class="row-flex">
        <div class="order-confirm-content">
            <p>Đơn hàng của bạn đã được gửi <span style="font-weight: bold;">Thành công</span>! <br>
                <span style="font-size: small;">Cảm ơn bạn đã tin tưởng chúng tôi</span>
            </p>
        </div>
    </div>
</section>
@endsection