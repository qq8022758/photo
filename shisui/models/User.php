<?php
/**
 * @author kylin.woo
 * train_audit
 */
class User extends BaseModel{
	public function __construct($registry){
		parent::__construct($registry);
		$this->tableName = 'users';
	}
	
	
	public function  getAllUser(){
		$sql="select * from ".$this->tableName;
		return $this->getAllData($sql);
	
	}
	/*
	*取得头像
	*传入用户的Id=mail_address
	*/
	public function  getAvater(){
		$id=isset($_POST['id'])?$_POST['id']:'0';			
		$sql="select avater from ".$this->tableName." where id='".$id."'";	;
		return $this->getAllData($sql);
	} 
	
	/*
	 * 查询用户信息 
	 * @param email  
	 * */
	public function  getUserInfoByEmail(){
		$mail_address=isset($_POST['email'])?$_POST['email']:"";		
		
		return $this->getByEmail($mail_address);	
	}
	
	/*
	 * 修改用户信息 
	 * @param email  
	 * */
	public function  ModifyUserInfo(){
		$mail_address=isset($_POST['mail_address'])?$_POST['mail_address']:"";
		$username = isset($_POST['username'])?$_POST['username']:"";
		$password = isset($_POST['password'])?$_POST['password']:"";
		$sex = isset($_POST['sex'])?$_POST['sex']:"female";
		$avater = isset($_POST['avater'])?$_POST['avater']:"";
		$newdata = array('mail_address'=>$mail_address,'username'=>$username,'password'=>$password,'sex'=>$sex,'avater'=>$avater);
		$condition="mail_address='$mail_address'";
		return $this->xiuGaiJiLu($this->tableName,$newdata,$condition);
	}
	

	/*
	 * 修改用户记事本 
	 * @param id and content  
	 * */
	public function  MUpdateContent(){
		$id=isset($_POST['id'])?$_POST['diaryContent']:"0";;
		$content=isset($_POST['diaryContent'])?$_POST['diaryContent']:"";
		$newdata = array('content'=>$content);
		$condition="id='$id'";
		return $this->xiuGaiJiLu($this->tableName,$newdata,$condition);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    /*
	 *—————————————————————————————— 以上正确的代码，以下是备用
	 * @param email password 
	 * */	
	
	
	
	/*
	 * 登陆
	 * @param email password 
	 * */
    public function  getOneUser(){		
		$email=isset($_POST['email'])?$_POST['email']:"";		
		$password=isset($_POST['password'])?$_POST['password']:"";
		$permission=isset($_POST['permission'])?$_POST['permission']:"normal";		
		$sql="select * from ".$this->tableName." where mail_address='$email' and password='$password' and permission='$permission'";
		if (!isset($_SESSION)) { // 或 if(!session_id())
            session_start();
        }
        $_SESSION['mail_address']=$email;
		return $this->getAllData($sql);
	}
	
	/**
	 *新增用户
	 * 新增数据操作
	 * @param $data  数据对象
	 */
	public function  addOneUser(){
		$mail_address=isset($_POST['email'])?$_POST['email']:"";
		$username = isset($_POST['username'])?$_POST['username']:"";
		$password = isset($_POST['password'])?$_POST['password']:"";
		$permission = isset($_POST['permission'])?$_POST['permission']:"normal";
		$sex = isset($_POST['sex'])?$_POST['sex']:"female";
		$registration_date =date("Y-m-d H:i:s");
		$avater = isset($_POST['avater'])?$_POST['avater']:"http://localhost/shisui/view/images/gravatar.png";
		$newdata = array('mail_address'=>$mail_address,'username'=>$username,'password'=>$password,'permission'=>$permission,'registration_date'=>$registration_date,'sex'=>$sex,'avater'=>$avater);
		//$this->info($newdata);
		return $this->add($this->tableName,$newdata);
	}
	
	
	
	/**
	 *
	 * 修改用户头像操作
	 * @param $data  数据对象
	 */
	public function  UpdateAvater(){
		//
		$mail_address = $_SESSION['mail_address'];echo "dlfjdlkfjdl";
		$avater = $_POST['path'];
		echo $avater;
		$sql="select * from ".$this->tableName;
		return $this->getAllData($sql);
	}
	
    /**
	 *
	 * 修改数据操作
	 * @param $data  数据对象
	 */
	//例子
	public function  xiuGai(){
		//
		$mail_address=isset($_POST['email'])?$_POST['email']:"";
		$username = isset($_POST['username'])?$_POST['username']:"";
		$password = isset($_POST['password'])?$_POST['password']:"";		
		$sex = isset($_POST['sex'])?$_POST['sex']:"female";
		$avater = isset($_POST['avater'])?$_POST['avater']:"";
		//

		$userid = isset($_POST['_2_20'])?$_POST['_2_20']:"";//dataid?
		
		$conditionuser="userID='$userid'";
		$conditioncustomer="userid='$userid'";
		$userdata = array('address'=>$address,'gender'=>$gender,'identitycard'=>$cardid,'username'=>$username,'birthday'=>$birthday,'mobile'=>$mobile,'mailbox'=>$mailbox,'degree'=>$degree);
		$customerdata=array('customerno'=>$customerno);//客户编号
		$this->xiuGaiJiLu('ju_user', $userdata, $conditionuser);
		$this->xiuGaiJiLu('ju_customerinfo', $customerdata, $conditioncustomer);

	}
	
	
       
	
}
?>