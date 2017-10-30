<?php
namespace app\admin\Model;

use think\Db;
use think\Model;

class CategoryModel extends Model{

	public function SelectCategory($id)
	{
		return Db::name('fourm')->where('pid',$id)->select();
	}

	public function deleteCategory($fid)
	{
		return Db::name('fourm')->where('fid',$fid)->delete();
	}
	
	public function InsertCategory($data)
	{
		return Db::name('fourm')->insert($data);
	}

	public function CountCategory()
	{
		return Db::name('fourm')->count();
	}
}