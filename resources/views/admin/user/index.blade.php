@extends('admin/layout')
@section('title')
    Quản lý admin
    
@endsection
@section('breadcrumbs')
    QUẢN LÝ ADMIN
    
@endsection

@section('content')
<style>
     td, th {
        text-align: center !important;
        vertical-align: middle !important; /* Căn giữa nội dung theo chiều dọc */
       
    }
    th{
      white-space: nowrap; /* Không ngắt dòng nội dung */
    }
    .btn1 a:hover{
        color: wheat;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                      <a class="btn btn-add btn-sm" href="{{route('role.create')}}" title="Thêm"><i class="fas fa-plus"></i>
                        Tạo mới sản phẩm
                      </a>
                    </div>
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm " href="/admin/quan-ly-san-pham/thung-rac" style="color: black"><i class="fas fa-trash-alt"></i>
                         Thùng Rác
                      </a>
                    </div>
                </div>
                <?php
                  $message = Session::get('message');
                  if(isset($message)){
                    echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';         
                  }
                ?>
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                           
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Chức Năng</th>
                            
            
                           
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($data as $list)
                        <tr>
                         
                          <td>{{$list->id}}</td>
                          <td>{{$list->name}}</td>
                          <td>{{$list->email}}</td>

                        
                          <td>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Role" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')">
                                <a href="/admin/quan-ly-san-pham/xoa-mem/{{$list->id}}"><i class="fas fa-trash-alt"></i></a>
                              </button>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')">
                              <a href="/admin/quan-ly-san-pham/xoa-mem/{{$list->id}}"><i class="fas fa-trash-alt"></i></a>
                            </button>
                            <button class="btn btn-primary btn-sm edit" type="button" title="Cập nhật">
                              <a href="/admin/quan-ly-san-pham/cap-nhat/{{$list->id}}"><i class="fas fa-edit"></i></a>
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