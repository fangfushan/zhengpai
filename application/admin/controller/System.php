<?php
namespace app\admin\Controller;

use app\admin\Model\CategoryModel;
use think\Controller;
use think\Session;
use think\Request;

class System extends Controller {

	protected $_Fourm;
	protected $_count;
	protected $_ParentFourm;

	public function __construct()
	{
		parent::__construct();
		$this->_Fourm = new CategoryModel();
		$this->_Count = $this->_Fourm->CountCategory();
	}

	/**
	 * 系统设置
	 */
	public function SystemBase()
    {
		return $this->fetch();
    }

	/**
	 * 栏目管理
	 */
	public function SystemCategory()
	{
		$this->_ParentFourm = $this->_Fourm->SelectCategory(0);
		foreach ($this->_ParentFourm as $key => $value) {
			$child = $this->_Fourm->SelectCategory($value['fid']);
			$this->_ParentFourm[$key]['child'] = $child;
		}
		$this->assign('count',$this->_Count);
		$this->assign('parentFourm',$this->_ParentFourm);
		return $this->fetch();
	}
	/**
	 * 系统日志
	 */
	public function SystemLog()
	{
		return $this->fetch();
	}
	/**
	 * [SystemCategoryAdd description]
	 * 添加栏目
	 */
	public function SystemCategoryAdd()
	{
		$System = $this->SystemCategory();
		$this->assign('parentFourm',$this->_ParentFourm);	
		return $this->fetch();
	}
	/**
	 * [ColumnManagement description]
	 * 栏目的更新
	 */

	/**
	 * 删除栏目
	 */
	public function deleteCategory()
	{
		if($fid = trim(input('post.fid'))){		
			if (is_numeric($fid)) {
				if($this->_Fourm->deleteCategory($fid)){
					return true;
				} else {
					return false;
				};
			}
		} else {
			return false;
		};
	}

	/**
	 * 添加板块
	 */
	public function InsertSystemCategory()
	{

		$data['pid'] = empty(input('post.pid')) ? 0 : (int)trim(input('post.pid'));
		if (input('post.fourm_name')) {
			$data['fourm_name'] = trim(input('post.fourm_name'));
			if ($this->_Fourm->InsertCategory($data)) {
				return show(1,'添加栏目成功');
			} else {
				return show(0,'添加栏目失败');
			}
		}
	}

	
}	