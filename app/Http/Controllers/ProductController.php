<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests;

class ProductController extends Controller
{
    public function getShow() {
        $product = Product::orderBy('id','DESC')->get();
        return view('admin.product.show',['product'=>$product]);
	}

	public function getThem() {
	   $category = Category::all();
		return view('admin.product.add',['category'=>$category]);
        
	}

	public function postThem(Request $request) {
		$this->validate($request,
		[
			'Category'=>'required',
			'connect'=>'required|min:50|unique:Product,connect',
            'name'=>'required|min:10|max:250',
            'price'=>'required',
            'image'=>'required'
			
		],[
			'Category.required'=>'Bạn chưa chọn danh mục',
			'connect.required'=>'Bạn chưa nhập nội dung',
			'connect.min'=>'nội dung phải có ít nhất 50 ký tự',
            'image.required'=>'Bạn chưa chọn hình ảnh',
            'name.required'=>'Bạn chưa nhập tên sản phẩm',
            'name.min'=>'Tên phải có ít nhất 10 ký tự',
            'price.required'=>'Bạn chưa nhập giá'
		]);
		$product = new Product;
		$product->name = $request->name;
		$product->idCategory = $request->Category;
        $product->quantity = $request->quantity;    
        $product->connect = $request->connect;
        $product->price = $request->price;
		

		if($request->hasFile('image'))
		{
			$file = $request->file('image');// lưu hình vào biến file
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
			{
				return redirect('admin/product/add')->with('thongbao','lỗi bạn chỉ được chọn file có đuôi jpg, png, jpeg');
			}
			$name = $file->getClientOriginalName();
			$image = str_random(4)."_". $name;//radom ko để trùng tên hình
			while(file_exists("uploads/product/".$image))
			{
				$image = str_random(4)."_". $name;
			}
			$file->move("uploads/product",$image);
			$product->image = $image;

		}
		else{
			$product->image = "";

		}
		$product->save();
		return redirect('admin/product/add')->with('thongbao','Thêm tin thành công');
	}

	public function getEdit($id)
	{
		$category = Category::all();
		$product = Product::find($id);
		return view('admin.product.edit',['product'=>$product, 'category'=>$category]);
	}

	public function postEdit(Request $request,$id)
	{
		$product = Product::find($id);
		$this->validate($request,
		[
			'Category'=>'required',
			'connect'=>'required|min:50|unique:Product,connect',
            'name'=>'required|min:10|max:250',
            'price'=>'required',
            'image'=>'required'
			
		],[
			'Category.required'=>'Bạn chưa chọn danh mục',
			'connect.required'=>'Bạn chưa nhập nội dung',
			'connect.min'=>'nội dung phải có ít nhất 50 ký tự',
            'image.required'=>'Bạn chưa chọn hình ảnh',
            'name.required'=>'Bạn chưa nhập tên sản phẩm',
            'name.min'=>'Tên phải có ít nhất 10 ký tự',
            'price.required'=>'Bạn chưa nhập giá'
		]);
		$product->name = $request->name;
		$product->idCategory = $request->Category;
        $product->quantity = $request->quantity;    
        $product->connect = $request->connect;
        $product->price = $request->price;

		if($request->hasFile('image'))
		{
			$file = $request->file('image');// lưu hình vào biến file
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
			{
				return redirect('admin/product/add')->with('thongbao','lỗi bạn chỉ được chọn file có đuôi jpg, png, jpeg');
			}
			$name = $file->getClientOriginalName();
			$image = str_random(4)."_". $name;//radom ko để trùng tên hình
			while(file_exists("uploads/product/".$image))
			{
				$image = str_random(4)."_". $name;
			}
			$file->move("uploads/product",$image);
			unlink("uploads/product/".$product->image);//xóa file cũ 
			$product->image = $image;

		}
		$product->save();
		return redirect('admin/product/edit/'.$id)->with('thongbao','Sửa thành công');
	}

	public function delete($id)
	{
		$product = product::find($id);
		$product->delete();

		return redirect('admin/product/show')->with('thongbao','Xóa thành công');
	}
}
