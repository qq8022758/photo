<?php
final class action {
	protected $file;
	protected $class;
	protected $method;
	protected $args = array();

	public function __construct($route, $args = array()) {
		$path = '';
		//echo $route;exit;
		$parts = explode('/', str_replace('../', '', (string)$route));//$parts([0]=> )
		foreach ($parts as $part) { 
			$path .= $part;
			
			if (is_dir(FRAMEWORK_PATH . 'controllers/' . $path)) {
				$path .= '/';
				
				array_shift($parts);
				
				continue;
			}
			
			if (is_file(FRAMEWORK_PATH . 'controllers/' . str_replace(array('../', '..\\', '..'), '', $path) . '.php')) {
				$this->file = FRAMEWORK_PATH . 'controllers/' . str_replace(array('../', '..\\', '..'), '', $path) . '.php';
				//将$path中所有除了大小写字母数字以外的字符替换为‘’
				$this->class = 'Controller' . preg_replace('/[^a-zA-Z0-9]/', '', $path);
				array_shift($parts);
				
				break;
			}
		}
		
		if ($args) {
			
			$this->args = $args;
		}
			
		$method = array_shift($parts);
			
		
		//echo $method;
		if ($method) {
			$this->method = $method;
		} else {
			$this->method = 'index';
		}
		//echo $this->args;exit;
		//echo $this->method;
		//echo $this->class;
		//echo $this->file;
	}
	
	public function getFile() {
		return $this->file;
	}
	
	public function getClass() {
		return $this->class;
	}
	
	public function getMethod() {
		return $this->method;
	}
	
	public function getArgs() {
		return $this->args;
	}
	
	
}
?>