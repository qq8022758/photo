<?php

class resetkey{
	

	private $registry;
	
	public function __construct( Registry $registry )
	{
	
		$this->registry = $registry;
	
		
		

	}
	
	public function getResetKey()
	{
		return md5(time().md5(rand(10000000,999999999)));
	}
	
	
}

?>