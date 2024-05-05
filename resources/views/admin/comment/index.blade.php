@extends('admin/layout')

@section('title')
    Quản lý bình luận
@endsection

@section('breadcrumbs')
    QUẢN LÝ BÌNH LUẬN
@endsection

@section('content')
<style>
     .ellipsis {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px; /* Điều chỉnh độ rộng tối đa của ô */
        cursor: pointer; /* Biến con trỏ thành dấu nhấp chuột khi di chuột vào */
    }
    td, th {
        text-align: center !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                

                <?php
                    $message = Session::get('message');
                    if(isset($message)){
                        echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';            
                    }
                ?>

                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>ID</th>
                            <th>Tên </th>
                            <th>Tên sản phẩm</th>
                           
                            <th>Nội dung</th>
                           
                            
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($comment as $list)
                    <tr>
                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                        <td>{{$list->id}}</td>
                        <td>{{$list->customer->name}}</td>
                        <td>{{$list->product->product_name}}</td>
                        
                        <td>{{$list->comment}}</td>
                        
                        <td>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn có muốn xóa comment này không?')">
                                <a href="/admin/quan-ly-binh-luan/xoa/{{$list->id}}"><i class="fas fa-trash-alt"></i></a>
                            </button>
                              
                        </td>
                    </tr>
                         
                     @endforeach 
             
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection