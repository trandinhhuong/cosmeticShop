@extends('admin.dgadmin.layout_admin')
@section('admin_content')

            <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách danh mục sản phẩm
    </div>
    <div class="table-responsive">
      <?php

// $message = Session::get('message');
// if ($message) {
// 	echo $message;
// 	Session::put('message', null);
// }

// ?>
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>

                @endif
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Edit</th>
            <th>Delete</th>
            
            
          <!--   <th>Quản Lý</th> -->
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
           @foreach($category as $tl)
          <tr>
            <td>{{$tl->id}}</td>
            <td>{{$tl->Name}}</td>
            <td>
              <a href="admin/category/edit/{{$tl->id}}" class="active styling-edit">
                Edit</a>
            </td>

            <td>
            <a onclick="return confirm('Bạn có chắc muốn xóa mục này không?')" href="admin/category/delete/{{$tl->id}}" class="active styling-edit" >
                Delete</a>
            </td>
          </tr>
              @endforeach
        </tbody>
      </table>
    </div>
   
  </div>
</div>


@endsection
