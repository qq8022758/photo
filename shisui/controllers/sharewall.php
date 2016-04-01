<?php

/**
 *controler层
 * 前台首页控制器
 */
class ControllerSharewall extends Controller{


	public function __construct($registry){
		parent::__construct($registry);

	}


    public function  getAllShare(){			
		require_once 'models/Sharewall.php';
		$user = new Sharewall($this->registry);
		$Sharewalldata = $user->getAllShare();
		$this->data[] = $this->assign('Sharewalldata', $Sharewalldata);	
		$this->toJSON();
	}   
/**
* 添加照片
* Enter description here ...
*/
	public function  Addshare(){			
		require_once 'models/sharewall.php';
		$Photo = new Sharewall($this->registry);
		$Successdata = $Photo->Addshare();
		$this->data[] = $this->assign('Successdata', $Successdata);	
		$this->toJSON();
	}   




	
	
}




