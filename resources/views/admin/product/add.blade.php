@extends('admin.dgadmin.layout_admin')
@section('admin_content')

   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm  sản phẩm
                        </header>
<!-- <?php

// $message = Session::get('message');
// if ($message) {
// 	echo $message;
// 	Session::put('message', null);
// }

?> -->
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
        @endif

        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>

        @endif
    <div class="panel-body">

        <div class="position-center">
            <form role="form" action="admin/product/add" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá sản phẩm</label>
                <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="nhập giá">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số lượng</label>
                <input type="number" min="1"  name="quantity" class="form-control" id="exampleInputEmail1">
            </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Nội dung chi tiết sản phẩm</label>
                <textarea style="resize: none" rows="8" type="text" value="{{old('connect')}}" name="connect" class="form-control" id="exampleInputPassword1" placeholder="nội dung sản phẩm"></textarea>
            </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
            <select name="Category" class="form-control input-sm m-bot15">
            @foreach($category as $tl)
                <option value="{{$tl->id}}">{{$tl->Name}}</option>
            @endforeach
            <!--  <option>Option 3</option> -->
        </select>
            </div>

            <button type="submit"  class="btn btn-info">Thêm sản phẩm</button>
        </form>
        </div>

    </div>
</section>

            </div>
@endsection
