@extends('admin/layout')

@section('title')
Cập nhật blog
@endsection

@section('breadcrumbs')
<a href="/admin/quan-ly-blog">Quản lý blog</a> / Cập nhật blog
@endsection

@section('content')
<script>

    function readURL(input, thumbimage) {
      if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      else { // Sử dụng cho IE
        $("#thumbimage").attr('src', input.value);

      }
      $("#thumbimage").show();
      $('.filename').text($("#uploadfile").val());
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'default');
      $(".removeimg").show();
      $(".Choicefile").unbind('click');

    }
    $(document).ready(function () {
      $(".Choicefile").bind('click', function () {
        $("#uploadfile").click();

      });
      $(".removeimg").click(function () {
        $("#thumbimage").attr('src', '').hide();
        $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
        $(".removeimg").hide();
        $(".Choicefile").bind('click', function () {
          $("#uploadfile").click();
        });
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'pointer');
        $(".filename").text("");
      });
    })
    
  </script>




<style>
  .Choicefile {
    display: block;
    background: #14142B;
    border: 1px solid #fff;
    color: #fff;
    width: 150px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    padding: 5px 0px;
    border-radius: 5px;
    font-weight: 500;
    align-items: center;
    justify-content: center;
  }

  .Choicefile:hover {
    text-decoration: none;
    color: white;
  }

  #uploadfile,
  .removeimg {
    display: none;
  }

  #thumbbox {
    position: relative;
    width: 100%;
    margin-bottom: 20px;
  }

  .removeimg {
    height: 25px;
    position: absolute;
    background-repeat: no-repeat;
    top: 5px;
    left: 5px;
    background-size: 25px;
    width: 25px;
    /* border: 3px solid red; */
    border-radius: 50%;

  }

  .removeimg::before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    content: '';
    border: 1px solid red;
    background: red;
    text-align: center;
    display: block;
    margin-top: 11px;
    transform: rotate(45deg);
  }

  .removeimg::after {
    /* color: #FFF; */
    /* background-color: #DC403B; */
    content: '';
    background: red;
    border: 1px solid red;
    text-align: center;
    display: block;
    transform: rotate(-45deg);
    margin-top: -2px;
  }
</style>
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Cập nhật blog</h3>
        <div class="tile-body">
         <?php
          $message = Session::get('message');
          if(isset($message)){
            echo '<span class="text-alert" style="color:red;text-align:center;width:100%;font-style:italic">'.$message.'</span>';
            		
          }
        
        
        ?>
          <form class="row" method="post" action="/admin/quan-ly-blog/cap-nhat/{{$data->id}}" enctype="multipart/form-data">
            <div class="form-group col-md-4">
              <label class="control-label">Tiêu đề</label>
              <input class="form-control" type="text" id="slug" onkeyup="ChangeToSlug()" name="blog_title" value="{{$data->blog_title}}">
            </div>
            <div class="form-group col-md-4">
                <label class="control-label">Slug</label>
                <input class="form-control" type="text" id="convert_slug" name="blog_slug" value="{{$data->blog_slug}}">
              </div>
           
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng Thái</label>
              @if ($data->blog_status == 1)
              <div class="form-control">
                <div class="form-check form-check-inline">
                    <input name="blog_status" id="hien" value="1" class="form-check-input" type="radio" checked>
                    <label class="form-check-label" for="hien">Hiện(1)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="blog_status" id="an" value="0" class="form-check-input" type="radio" value="{{old('blog_status')}}">
                    <label class="form-check-label" for="an">Ẩn(0)</label>
                </div>
               
            </div>
                  
              @else
              <div class="form-control">
                <div class="form-check form-check-inline">
                    <input name="blog_status" id="hien" value="1" class="form-check-input" type="radio">
                    <label class="form-check-label" for="hien">Hiện(1)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="blog_status" id="an" value="0" class="form-check-input" type="radio" checked>
                    <label class="form-check-label" for="an">Ẩn(0)</label>
                </div>
               
            </div>
                  
              @endif
             
            {{-- @error('category_status')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror --}}
            </div>
            <div class="form-group col-md-4">
              <label for="exampleSelect1" class="control-label">Danh Mục Blog</label>
              <select class="form-control" id="exampleSelect1" name="category_blog_id" >
                <option>-- Chọn danh mục --</option>
                <?php $category = \App\Models\tbl_category_blog::all();  ?>
               
                @foreach ($category as $category)
                @if ($data->category_blog_id == $category->id)
                    <option value="{{$category->id}}" selected >{{$category->category_name}}</option>
                @else
                <option value="{{$category->id}}" >{{$category->category_name}}</option>
                    
                @endif
                
                @endforeach
                
               
              </select>
                 {{-- @error('brand_id')
                        <small><i class="text-danger">{{ $message }}</i></small>
                        @enderror --}}
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label">Ảnh bìa</label>
                <div id="myfileupload">
                  <input type="file" id="uploadfile" name="blog_image" onchange="readURL(this);" />
                </div>
                <div id="thumbbox">
                  <img height="450" width="400" alt="Thumb image" id="thumbimage" src="{{asset('uploads/blog/'.$data->blog_image)}}"/>
                  <a class="removeimg" href="javascript:"></a>
                </div>
                <div id="boxchoice">
                  <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                  <p style="clear:both"></p>
                </div>
  
              </div>
              {{-- @error('brand_logo')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            
           
            <div class="form-group col-md-12">
              <label class="control-label">Mô tả ngắn</label>
              <textarea class="form-control" name="blog_description" id="mota">
                    {{$data->blog_description}}
              </textarea>
              
            </div>
            <div class="form-group col-md-12">
                <label class="control-label">Nội dung</label>
                <textarea class="form-control" name="blog_content" id="mota">
                    {{$data->blog_content}}
                </textarea>
                
              </div>

        </div>
        <button class="btn btn-save" type="submit">Cập Nhật</button>
        @csrf
        <button class="btn btn-cancel" type="reset">Hủy bỏ</button>
    
       
      </div>
    </div>
  </div>
@endsection