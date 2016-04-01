<?php
/**
 * @author kylin.woo
 * train_audit
 */
class Sharewall extends BaseModel{
	public function __construct($registry){
		parent::__construct($registry);
		$this->tableName = 'sharewall';
	}
	
	
	public function  getAllShare(){
		$sql="select * from ".$this->tableName." ORDER BY `share_time` DESC";
		return $this->getAllData($sql);
	
	}
/*
* 添加照片
* @param email password 
* */
	public function Addshare(){
		//获取当前的aid
		$authorName=isset($_POST['authorName'])?$_POST['authorName']:'';
		$authorAvater=isset($_POST['authorAvater'])?$_POST['authorAvater']:'';
		$share_time=date("Y-m-d H:i:s");
		$mood_color=isset($_POST['mood_color'])?$_POST['mood_color']:'7';
		$mood_content=isset($_POST['mood_content'])?$_POST['mood_content']:'';
		$path=isset($_POST['path'])?$_POST['path']:'';
		$newdata = array('authorName'=>$authorName,'authorAvater'=>$authorAvater,'share_time'=>$share_time,'mood_color'=>$mood_color,'mood_content'=>$mood_content,'path'=>$path);	   
         $this->xinZengJiLu($this->tableName,$newdata);
		  return true;
	}


	
}
?>