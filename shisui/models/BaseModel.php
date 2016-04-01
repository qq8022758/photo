<?php
/**
 * model基类，封装了基本的增删改查功能
 * @author han
 *
 */
class BaseModel{
	/**
	 * 表名
	 */
	public $tableName;
	protected $registry;
	 

	static protected $config ;

	public function __construct( Registry $registry ){
		$this->registry = $registry;
					
	}
	
	public function getAllData($sql,$model=MYSQLI_ASSOC, $db='db'){
		$this->registry->getObject($db)->executeQuery($sql);
		$data=$this->registry->getObject($db)->getAll($model);
		return $data;

	}
	
	public function getRowsData($sql, $db='db'){
		$this->registry->getObject($db)->executeQuery($sql);
		$data=$this->registry->getObject($db)->getRows($sql);
		return $data;
	}

	
	/**
	 * 查询所有
	 */
	public function getAll($db='db'){
		$sql="select * from " . $this->tableName . " order by id desc";
		return $this->getAllData($sql,MYSQLI_ASSOC, $db);
	}

	/**
	 * 根据id查询
	 * @param $id 主键
	 */
	public function getById($id, $db='db'){
		$sql="select * from " . $this->tableName . " where actionID='$id'";
		return $this->getAllData($sql,MYSQLI_ASSOC, $db);
	}

	/**
	 * 根据id查询
	 * @param $mail_address 主键
	 */
	public function getByEmail($mail_address, $db='db'){
		$sql="select * from " . $this->tableName . " where mail_address='$mail_address'";
		return $this->getAllData($sql,MYSQLI_ASSOC, $db);
	}
	
	/**
	 * 根据mail_address查询 id
	 * @param $mail_address 主键
	 */
	public function getIdByEmail($mail_address, $db='db'){
		$sql="select id from " . $this->tableName . " where mail_address='$mail_address'";
		return $this->getRowsData($sql, $db);
	}
	
	/**
	 * 根据id查询
	 * @param $id 主键
	 */
	public function getByIdByRow($id, $db='db'){
		$sql="select * from " . $this->tableName . " where actionID='$id'";			
		return $this->getRowsData($sql, $db);
	}
	
	/**
	 * 根据id删除
	 * @param $id 主键
	 */
	public function deleteById($id, $db='db'){
		$sql="delete from " . $this->tableName . " where id='$id'";
		$this->registry->getObject($db)->executeQuery($sql);
	}
	
	public function delByCondition($condition, $limit, $db='db'){
		$limit = ( $limit == '' ) ? '' : ' LIMIT ' . $limit;
		$delete = "DELETE FROM ".$this->tableName." WHERE {$condition} {$limit}";
		$this->registry->getObject($db)->executeQuery( $delete );
			
	}

	public function executeQuery($sql, $db='db'){
		return $this->registry->getObject($db)->executeQuery( $sql);
	}
	public function lastInsertId($db='db'){
		$this->registry->getObject($db)->lastInsertID();
	}
	
	
	/**
	 * 新增
	 * @param $data 新增的数据
	 */
	public function add($table,$data, $db='db'){			
		$this->registry->getObject ( $db )->insertRecords($table , $data);
		return $this->registry->getObject ( $db )->lastInsertID();
	}



	/**
	 *
	 * 新增单条记录
	 * @param unknown_type $table
	 * @param unknown_type $data
	 */
	public function xinZengJiLu($table,$data){
		$this->registry->getObject ('db' )->insertRecords($table , $data);
		return $this->registry->getObject ( 'db' )->lastInsertID();
	}

	/**
	 *
	 * 新增单条记录(不重复的数据)
	 * @param unknown_type $table
	 * @param unknown_type $data
	 * @param unknown_type $condition
	 */
	public function xinZengWeiYiJiLu($table,$data,$condition=true){
		$this->registry->getObject ('db' )->insertRecordsByCondition($table , $data,$condition);
		return $this->registry->getObject ( 'db' )->lastInsertID();
	}





	/**
	 *
	 * 删除记录
	 * @param  $table
	 * @param  $condition
	 */
	public function shanChuJiLu($table, $condition){

		$sql="delete from " . $table . " where ".$condition;
		return $this->registry->getObject('db')->executeQuery($sql);
	}


	/**
	 *
	 * 获取单条记录
	 * @param  $sql
	 */
	public function huoQuDanJiLu($sql){
		$this->registry->getObject($db)->executeQuery($sql);
		$data=$this->registry->getObject('db')->getRows($sql);
		return $data;
	}



	/**
	 * 根据id更新
	 * @param $id 主键
	 * @param $data 更新的数据
	 */
	public function updateById($id, $data, $db='db'){
		$this->registry->getObject ( $db )->updateRecords($this->tableName , $data, "id=$id");

	}

	public function affectedRows($db='db'){
		return $this->registry->getObject ( $db )->affectedRows();
	}

	public function updateByCondition($condition, $data,$db='db'){
		return $this->registry->getObject ( $db )->updateRecords($this->tableName,$data,$condition);

	}

	/**
	 * 根据条件修改单条记录
	 * @param $id 主键
	 * @param $data 更新的数据
	 */
	public function xiuGaiJiLu($table, $data, $condition){
		return $this->registry->getObject ( 'db' )->updateRecords($table , $data, $condition);
	}

	/**
	 * 生成guid
	 *
	 * @param unknown_type $prefix
	 */
	public function uuid($prefix = '')
	{
		$chars = md5(uniqid(mt_rand(), true));
		$uuid  = substr($chars,0,8) . '-';
		$uuid .= substr($chars,8,4) . '-';
		$uuid .= substr($chars,12,4) . '-';
		$uuid .= substr($chars,16,4) . '-';
		$uuid .= substr($chars,20,12);
		return $prefix . $uuid;
	}


}

