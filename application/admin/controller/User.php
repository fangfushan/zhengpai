<?php

namespace app\admin\Controller;
use think\Controller;
use think\Session;
use app\admin\model\UserModel;
use think\Request;

class User extends Controller{

	protected $_request;
	protected $_user;

	public function __construct()
	{
		parent::__construct();
		$this->_request = Request::instance();
		$this->_user = new UserModel();
	}
	/**
	 * 用户登录
	 */
	public function Login()
	{
		return $this->fetch();
	}

	/**
	 * 用户登录
	 */
	public function Register()
	{
		return $this->fetch();	
	}
	/**
	 * 密码找回
	 */
	public function Forget()
	{
		return $this->fetch();
	}

	public function doRegister()
	{
		$username = trim(input('post.username'));
		$password = trim(input('post.password'));
		if (!$username || !$password) {
			return show(0,'用户名或密码不能为空');
		}

		$res = $this->_user->SelectUser($username);

		if ($res) {
			return show(0,'用户名已被占用');
		}

		$data['username'] = $username;
		$data['password'] = md5('salt'.$password);
		$data['email'] = trim(input('post.email'));
		
	    $userAdd = $this->_user->InsertUser($data);
		if ($userAdd) {
			return show(1,'注册成功');
		}

	}

	public function doLogin()
	{
		$username = trim(input('post.username'));
		$password = md5('salt'.trim(input('post.password')));
		$ip = $_SERVER['REMOTE_ADDR'];

		if($res = $this->_user->SelectUser($username)){
			$user_id = $res['user_id']; 
			if ($res['password'] == $password) {
				Session::set('username',$username);
				$this->_user->UpdateUserLoginIp($user_id,$ip);
				return show(1,'登录成功');
			} else {
				return show(0,'用户名或密码错误');
			}
		}


	}
	/**
	 * 退出登录
	 */
	public function LoginOut()
	{
		Session::clear();
		$this->success('退出成功','\admin\user\login');
	}
}