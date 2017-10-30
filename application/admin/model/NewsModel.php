<?php
namespace app\admin\Model;

use think\Model;
use think\Db;

class NewsModel extends Model{

	public function InsertNews($data)
	{
		 return Db::name('news')->InsertGetId($data);
	}	 

}		 