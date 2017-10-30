<?php
namespace app\admin\Controller;
use think\Controller;
use think\Session;
use app\admin\Model\CategoryModel;
use app\admin\Model\NewsModel;
use app\admin\Model\NewsContentModel;
use think\Request;


class Article extends Controller {

	protected $_ParentFourm;
	protected $_Fourm;
	protected $_News;
	protected $_InsertContent;


	public function __construct()
	{
		parent::__construct();
		$this->_Fourm = new CategoryModel();
		$this->_News = new NewsModel();
		$this->_InsertContent = new NewsContentModel();
	}
	public function ArticleList() 
	{

		return $this->fetch();

	}
	public function ArticleAdd() 
	{
		$this->_ParentFourm = $this->_Fourm->SelectCategory(0);
		foreach ($this->_ParentFourm as $key => $value) {
			$child = $this->_Fourm->SelectCategory($value['fid']);
			$this->_ParentFourm[$key]['child'] = $child;
		}
		$this->assign('parentFourm',$this->_ParentFourm);
		return $this->fetch();
	}
	/**
	 * 添加文章
	 */
	public function InsertAdd()
	{	
		$file = request()->file('file');
		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		if($info){
			$saveName = $info->getSaveName();
			$data['thumb'] = '/uploads/'.str_replace('\\','/',$saveName);
			return json_encode($data);	
		}

			
	}
	public function InsertArticle()
	{

		
		$data['title'] = input('post.title');
		$data['small_title'] = input('post.small_title');
		$data['catid'] = input('post.catid');
		$data['keywords'] = input('post.keywords');
		$data['description'] = input('post.description');
		$data['copyfrom'] = input('post.copyfrom');
		$data['fromuser'] = input('post.fromuser');
		$data['thumb'] = input('post.thumb');
		$data['create_time'] = date(time(),'Y-m-d H:i:s');
		 if ($arr['news_id'] = $this->_News->InsertNews($data)) {
		  	   $arr['content'] = htmlspecialchars(input('post.editorValue'));

		  	   if($this->_InsertContent->InsertContent($arr)){

		  	   		return show(1,'上传成功');
		  	   } else {
		  	   	    return show(0,'上传失败');
		  	   } 

		 }
	}

	


	

}