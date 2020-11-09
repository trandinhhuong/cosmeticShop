@extends('admin.dgadmin.layout_admin')
@section('admin_content')

   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục sản phẩm
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
                                <form role="form" action="admin/category/edit/{{$category->id}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input value="{{$category->Name}}" type="text" name="Name" class="form-control" id="exampleInputEmail1" placeholder="nhập tên danh mục" />
                                </div>
                                <button type="submit" name="" class="btn btn-info">Thêm Danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
