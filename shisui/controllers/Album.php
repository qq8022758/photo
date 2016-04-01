<?php

/**
 *controler层
 * 前台首页控制器
 */
class ControllerAlbum extends Controller{


	public function __construct($registry){
		parent::__construct($registry);

	}


   /**
    * 例子
    * Enter description here ...

	public function  demo(){			
		require_once 'models/User.php';
		echo 333;
		$user = new User($this->registry);
		$data = $user->getAllUser();
		print_r($data);
		//include (FRAMEWORK_PATH .'view/index.php');
	}   
	 */
   /**
    * 例子
    * Enter description here ...
	 */
	public function  creatNewAlbum(){			
		require_once 'models/Album.php';
		$album = new Album($this->registry);
		$data = $album->AddOneAlbum();
	    //获取到的放到data[]中
		$this->data[] = $this->assign('data', $data);	
		//最后返回json数据
		$this->toJSON();
		//print_r($data);
		//include (FRAMEWORK_PATH .'view/index.php');
	}   
	 
	
	/*
	*修改相册信息
	*传入用户的cat_id和user_id aid
	*/
	public function  ModifyAlbumInfo(){			
		require_once 'models/Album.php';
		$album = new Album($this->registry);
		$albumId = $album->ModifyAlbumInfo();
		$this->data[] = $this->assign('albumId', $albumId);	
		//最后返回json数据
		$this->toJSON();
	} 
	
	/*
	*取得一个相册信息
	*传入用户的cat_id和user_id aid
	*/
	public function  getOneAlbumInfo(){			
		require_once 'models/Album.php';
		$album = new Album($this->registry);
		$albumData = $album->getOneAlbumInfo();
		$this->data[] = $this->assign('albumData', $albumData);	
		//最后返回json数据
		$this->toJSON();
	} 
	
    /*
	*删除一个相册信息
	*传入用户的cat_id和user_id aid
	*/
	public function  DeleteAlbumInfo(){			
		require_once 'models/Album.php';
		$album = new Album($this->registry);
		$deleteAlbum = $album->DeleteAlbumInfo();
		$this->data[] = $this->assign('deleteAlbum', $deleteAlbum);	
		//最后返回json数据
		$this->toJSON();
	} 
	
	
}




