<?php
namespace app\admin\Model;

use think\Db;
use think\Model;
use think\Request;

class UserModel extends Model{

	public function SelectUser($username)
	{
		return Db::name('user')->where('username',$username)->find();
	}

	public function InsertUser($data)
	{
		return Db::name('user')->insert($data);
	}
	public function UpdateUserLoginIp($id,$ip)
	{
		return Db::name('user')->where('user_id',$id)->update(['last_login_ip' => $ip]);
	}
}