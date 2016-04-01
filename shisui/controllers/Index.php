<?php

/**
 *controler层
 * 前台首页控制器
 */
class ControllerIndex extends Controller{


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

	
	
	public function  demo(){			
		require_once 'models/User.php';
		$user = new User($this->registry);
		$userdata = $user->getAllUser();
		//获取到的放到data[]中
		$this->data[] = $this->assign('userdata', $userdata);	
		//最后返回json数据
		$this->toJSON();
	}  
	 
	public function  signIn(){		
		require_once 'models/User.php';
		$user = new User($this->registry);
		$userdata = $user->getOneUser();
		//获取到的放到data[]中
		$this->data[] = $this->assign('userdata', $userdata);	
		//最后返回json数据
		$this->toJSON();
	}
	
	public function  registing(){			
		require_once 'models/User.php';
		$user = new User($this->registry);
		$userdata = $user->addOneUser();
		$this->data[] = $this->assign('userdata', $userdata);	
		//最后返回json数据
		$this->toJSON();
	} 
	/*
	*修改头像
	*传入用户的Id=mail_address
	*/
    public function  UpdateUserAvater(){			
		require_once 'models/User.php';
		$user = new User($this->registry);
		$Avaterdata = $user->UpdateAvater();
		$this->data[] = $this->assign('Avaterdata', $Avaterdata);	
		//最后返回json数据
		$this->toJSON();
	} 
	
	public function  getUserInfoByEmail(){			
		require_once 'models/User.php';
		$user = new User($this->registry);
		$userInfo = $user->getUserInfoByEmail();
		$this->data[] = $this->assign('userInfo', $userInfo);	
		//最后返回json数据
		$this->toJSON();
	} 
	/*
	*取得头像
	*传入用户的Id=mail_address
	*/
	public function  getAvater(){			
		require_once 'models/User.php';
		$user = new User($this->registry);
		$AvaterInfo = $user->getAvater();
		$this->data[] = $this->assign('AvaterInfo', $AvaterInfo);	
		//最后返回json数据
		//echo $this;
		 $this->toJSON();
	} 
	
	/*
	*修改用户个人信息
	*传入用户的Id=mail_address
	*/
	public function  ModifyUserInfo(){			
		require_once 'models/User.php';
		$user = new User($this->registry);
		$userId = $user->ModifyUserInfo();
		$this->data[] = $this->assign('userId', $userId);	
		//最后返回json数据
		$this->toJSON();
	} 
	
	/*
	*修改用户记事本
	*传入用户的Id
	*/
	public function  updateDiaryContent(){			
		require_once 'models/User.php';
		$user = new User($this->registry);
		$DiaryContent = $user->MUpdateContent();
		$this->data[] = $this->assign('DiaryContent', $DiaryContent);	
		//最后返回json数据
		$this->toJSON();
	} 
	
	
	
}




