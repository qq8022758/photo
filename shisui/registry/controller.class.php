<?php
abstract class Controller {
	protected $registry;
	protected $id;
	protected $layout;
	protected $template;
	protected $children = array();
	protected $data = array();
	protected $output;
	protected $siteurl;
	protected $pagination;
	protected $goPageUrl;
	protected $errorPage;
	protected $displayPage;
	protected $column;
	protected $mem;
	protected $weekarray=array("日","一","二","三","四","五","六");
	protected $log;


	public function __construct($registry) {
		$this->registry = $registry;
		require_once(FRAMEWORK_PATH  . 'models/BaseModel.php');
		$PHP_SELF=$_SERVER['PHP_SELF'];
		$url=$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF,'/')+1);
		$url = str_replace('//','/',$url);
		$url='http://'.$url;		
		$this->siteurl = $url;
	}
	/**
	 *
	 *  显示视图页面
	 * @throws Exception
	 */
	public function index(){
		include (FRAMEWORK_PATH .'view/index.php');
		 
	}

	public function assign($divname='data',$val=array(),$type='data',$code='0',$error=''){

		return array('divname'=>$divname,'error'=>$error,'type'=>$type,'data'=>$val,'code'=>$code);
	}

	public function toJSON(){
		echo json_encode($this->data);
	}

	public function __get($key) {
		return $this->registry->getObject($key);
	}

	public function __set($key, $value) {
		$this->registry->createAndStoreObject($value,$key);
	}

	protected function forward($route, $args = array()) {
		return new Action($route, $args);
	}

	protected function redirect($url, $status = 302, $top=false) {
		header('Status: ' . $status);
		//$url = $this->siteurl . $url;
		if($top)
		echo '<script type="text/javascript">top.location.href="'  . $url . '";</script>';
		else
		header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url));
		exit();
	}

	protected function getChild($child, $args = array()) {
		$action = new Action($child, $args);

		if (file_exists($action->getFile())) {
			require_once($action->getFile());

			$class = $action->getClass();

			$controller = new $class($this->registry);

			$controller->{$action->getMethod()}($action->getArgs());

			return $controller->output;
		} else {
			trigger_error('Error: Could not load controller ' . $child . '!');
			exit();
		}
	}

	 


	 

 



 


 


}
?>