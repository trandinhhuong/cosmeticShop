@extends('admin.dgadmin.layout_admin')
@section('admin_content')

            <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
     
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php

$message = Session::get('message');
if ($message) {
	echo $message;
	Session::put('message', null);
}

?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Id</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th>Nội dung</th>
            <th>Số lượng</th>     
            <th>Edit</th>
            <th>Delete</th>
         
          </tr>
        </thead>
        <tbody>
        @foreach($product as $pro)
          <tr>
            <td>{{$pro->id}}</td>
            <td>{{$pro->name}}</td>
            <td>{{$pro->price}}</td>
            <td><img src="uploads/product/{{$pro->image}}" alt="" height="100" width="100"></td>
            <td>{{$pro->category->Name }}</td>
            <td>{{$pro->connect}}</td>
            <td>{{$pro->quantity}}</td>



           

            <td>
              <a href="admin/product/edit/{{$pro->id}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>

                
            </td>
            <td><a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="admin/product/delete/{{$pro->id}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a></td>
          </tr>
              @endforeach
        </tbody>
      </table>
    </div>
    <footer>
     
    </footer>
  </div>
</div>


@endsection
