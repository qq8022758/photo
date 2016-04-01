<?php
/**
 * @author kylin.woo
 * train_audit
 */
class Photo extends BaseModel{
	public function __construct($registry){
		parent::__construct($registry);
		$this->tableName = 'images';
	}
	
	
	public function  getAllPhoto(){
		$sql="select * from ".$this->tableName;
		return $this->getAllData($sql);
	
	}
/*
* 添加照片
* @param email password 
* */
	public function AddPhoto(){
		//获取当前的aid
		$aid=isset($_POST['aid'])?$_POST['aid']:'0';
		$picsUrlStr=isset($_POST['picsUrlArrNew'])?$_POST['picsUrlArrNew']:'0';
		print_r($picsUrlStr);
		for ($i=0; $i<=$picsUrlStr.length; $i++){
		   $date_available=date("Y-m-d H:i:s");
		   $name="";
		   $path="";
		  // list(,,,,$name) = split ('[//]', $date);
		   $newdata = array('name'=>$name,'path'=>$path,'date_available'=>$date_available,'storage_category_id'=>$aid);	   
           $this->xinZengJiLu($this->tableName,$newdata);
		   }
		   return true;
	}
	
	/*
* 添加照片
* @param email password 
* */
	public function getOnePhoto(){
		//获取当前的aid

		 $id=isset($_POST['id'])?$_POST['id']:'0';
         $sql="select path from ".$this->tableName." where id='".$id."'";	
         return $this->getAllData($sql);
		   
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
		/*
	 * 修改相册信息 
	 * @param cat_id  user_id aid
	 * */
	public function  ModifyAlbumInfo(){
		$cat_id=isset($_POST['cat_id'])?$_POST['cat_id']:"0";
		$user_id=isset($_POST['user_id'])?$_POST['user_id']:"0";
		$aid=isset($_POST['aid'])?$_POST['aid']:"0";
		
		$name=isset($_POST['name'])?$_POST['name']:"";
		$description = isset($_POST['description'])?$_POST['description']:"";
		$classification = isset($_POST['classification'])?$_POST['classification']:"最爱";
		$status = isset($_POST['status'])?$_POST['status']:"public";
		$cover = isset($_POST['cover'])?$_POST['cover']:"";
		$update_time =date("Y-m-d H:i:s");
		
		$newdata = array('name'=>$name,'description'=>$description,'classification'=>$classification,'status'=>$status,'cover'=>$cover,'update_time'=>$update_time);
				
		$condition="id='$aid' and cat_id='$cat_id'";
		return $this->xiuGaiJiLu($this->tableName,$newdata,$condition);
	
	}
		
		
	/*
	 * 获取相册信息 
	 * @param cat_id  user_id aid
	 * */
	public function  getOneAlbumInfo(){
		$cat_id=isset($_POST['cat_id'])?$_POST['cat_id']:"0";
		$aid=isset($_POST['aid'])?$_POST['aid']:"0";
				
	    $sql="select * from ".$this->tableName." where id=".$aid." and cat_id=".$cat_id;
		return $this->getAllData($sql);
	
	}
		
	
	/*
	 * 删除相册信息 
	 * @param cat_id  user_id aid
	 * */
	public function  DeleteAlbumInfo(){
		$cat_id=isset($_POST['cat_id'])?$_POST['cat_id']:"0";
		$aid=isset($_POST['aid'])?$_POST['aid']:"0";
		
		$condition="id='$aid' and cat_id='$cat_id'";		
		$this->shanChuJiLu($this->tableName,$condition);
		
		
		
		$condition2="storage_category_id='$aid'";		
		$this->shanChuJiLu('images',$condition2);
		
		$condition3="storage_category_id='$aid'";		
		$this->shanChuJiLu('image_category',$condition3);
		return true;
	
	}	
	
	
		/*
	 * 修改用户信息   以上是OK的
	 * @param email  ——————————————————————————————————————————————————————————————————————————————————
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
		$newdata = array('mail_address'=>$mail_address,'username'=>$username,'password'=>$password,'sex'=>$sex,'permission'=>$permission,'registration_date'=>$registration_date);
		//$this->info($newdata);
		return $this->add($this->tableName,$newdata);
	}
	
	
	
	/**
	 *
	 * 修改用户头像操作
	 * @param $data  数据对象
	 */
	public function  UpdtaAvater(){
		//
		$mail_address = $_SESSION['mail_address'];
		$avater = $_POST['path'];
		echo $avater;
		echo "dlfjdlkfjdl";
		//
		$conditionuser="mail_address='$mail_address'";
		$avatardata = array('avater'=>$avatar);//用户头像path
		$this->xiuGaiJiLu($this->tableName, $avatardata, $conditionuser);
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
	
	
        public function  xiuGaiUserInfo(){
		//
		$username = isset($_POST['_1_4'])?$_POST['_1_4']:"";
		$address = isset($_POST['_1_10'])?$_POST['_1_10']:"";
		$gender = isset($_POST['_1_6'])?$_POST['_1_6']:"";
		$birthday = isset($_POST['_1_7'])?strtotime($_POST['_1_7']):"";
		$mobile =  isset($_POST['_1_8'])?$_POST['_1_8']:"";
		$mailbox = isset($_POST['_1_9'])?$_POST['_1_9']:"";
		$degree = isset($_POST['_1_5'])?$_POST['_1_5']:"";
		$customerno = isset($_POST['_1_3'])?$_POST['_1_3']:"";
		$cardid = isset($_POST['_1_11'])?$_POST['_1_11']:"";
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