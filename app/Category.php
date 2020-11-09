<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "Category";

	public function product() {
		return $this->hasMany('App\Product', 'idCategory', 'id'); //liên kết 1 nhiều, id khóa chính
	}
	// public function tintuc() {
	// 	return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id'); // idtheloai vs id loaitin khóa phụ
	// }
}
