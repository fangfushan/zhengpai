<?php
namespace app\admin\Controller;

use think\Controller;
use think\Session;

class Admin extends Controller{


	/**
	 * 角色管理
	 */
	public function AdminRole()
	{
		return $this->fetch();
	}
	/**
	 * 权限管理
	 */
	public function AdminPerMission()
	{
		return $this->fetch();
	}
	/**
	 * 管理员列表
	 */
	public function AdminList()
	{
		return $this->fetch();
	}
	/**
	 * 添加管理员
	 */
	public function AdminAdd()
	{
		return $this->fetch();
	}

	/**
	 * 添加角色
	 */
	public function AdminRoleAdd()
	{
		return $this->fetch();
	}

}
