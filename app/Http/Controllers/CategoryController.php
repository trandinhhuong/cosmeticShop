<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;

class CategoryController extends Controller
{
    //
    public function getShow()
    {
		$category = Category::all(); //hàm all lấy tất cả tcategory
		return view('admin.category.show', ['category' => $category]);
    }
    public function getThem() {
		return view('admin.category.add');
	}

	public function postThem(Request $request) {
		$this->validate($request,
		[
			'Name' => 'required|min:3|max:100|unique:Category,Name'
		],
		[
			'Name.required'=>'Bạn chưa nhập tên danh mục',
			'Name.min'=>'tên thể loại phải từ 3 cho đên 100 ký tự',
			'Name.max'=>'tên thể loại phải từ 3 cho đên 100 ký tự',
			'Name.unique'=>'Tên thể loại đã tồn tại'
		]);
		$category = new Category;
		$category->Name = $request->Name;
		$category->save();
		
		return redirect('admin/category/add')->with('thongbao','Thêm thành công');
	}

	public function getEdit($id)
	{
		$category = Category::find($id);
		return view('admin.category.edit',['category'=>$category]);
	}

	public function postEdit(Request $request,$id)
	{
		$category = Category::find($id);
		$this->validate($request, 
		[
			'Name' => 'required|unique:Category,Name|min:3|max:100'
		],
		[
			'Name.required' => 'Bạn chưa nhập tên danh mục',
			'Name.unique'=>'Tên danh mục đã tồn tại',
			'Name.min'=>'tên danh mục phải từ 3 cho đên 100 ký tự',
			'Name.max'=>'tên danh mục phải từ 3 cho đên 100 ký tự'
		]);

		$category->Name = $request->Name;
		$category->save();

		return redirect('admin/category/edit/'.$id)->with('thongbao','Sửa thành công');
	}

	public function delete($id)
	{
		$category = Category::find($id);
		$category->delete();

		return redirect('admin/category/show')->with('thongbao', 'bạn đã xóa thành công');
	}
    
}
