<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class NewsContentModel extends Model{

	public function InsertContent($data)
	{
		return Db::name('news_content')->Insert($data);
	}
	
}