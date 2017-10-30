<?php
namespace app\admin\Controller;
use think\Controller;
use think\Session;
class Index extends Controller{

	/**
	 * 后台首页
	 */
	public function Index()
	{
		if (Session('?username')) {
			return $this->fetch();
		} else {
			$this->error('请先登录','\admin\user\login');
		}
		
	}

	public function Welcome()
	{
		return $this->fetch();
	}
}

