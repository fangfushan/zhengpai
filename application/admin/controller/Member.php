<?php

namespace app\admin\Controller;
use think\Controller;
use think\Session;

class Member extends Controller {

	/**
	 * 会员列表
	 */
	public function MemberList()
	{
		return $this->fetch();
	}
	/**
	 * 删除的会员
	 */
	public function MemberDel()
	{
		return $this->fetch();
	}
	/**
	 * 会员浏览记录
	 */
	public function MemberRecordBrowse()
	{
		return $this->fetch();
	}
	/**
	 * 添加会员
	 */
	public function MemberAdd()
	{
		return $this->fetch();
	}
	/**
	 * 会员分享记录
	 */
	public function MemberRecordShare()
	{
		return $this->fetch();
	}

	
}