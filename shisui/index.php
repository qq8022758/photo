<?php

session_start();
date_default_timezone_set('Asia/Shanghai');
//error_reporting(~E_ALL);
//set_time_limit(1800);
DEFINE("FRAMEWORK_PATH", dirname( __FILE__ ) ."/" );
DEFINE("ALBUM_PATH", dirname( __FILE__ ) ."\\" );

header("Content-Type: text/html; charset=utf-8");


require('registry/registry.class.php');
$registry = new Registry();

// setup our core registry objects
//设置registry的基类
$registry->createAndStoreObject( 'mysqldb', 'db' );
$registry->createAndStoreObject( 'authenticate', 'authenticate' );
$registry->createAndStoreObject( 'urlprocessor', 'url' );
$registry->createAndStoreObject( 'resetkey', 'resetkey' );
$registry->createAndStoreObject( 'mysqldb', 'shisui' );



//获取url
$registry->getObject('url')->getURLData();

// database settings
include(FRAMEWORK_PATH . 'config.php');

//创建数据库连接

/*系统*/

$registry->getObject('db')->newConnection( $configs['db_host_sn'], $configs['db_user_sn'], $configs['db_pass_sn'], 'shisui');
$registry->getObject('db')->newConnection( $configs['db_host_sn'], $configs['db_user_sn'], $configs['db_pass_sn'], $configs['db_name_sn']);
$registry->getObject('db')->executeQuery('set names utf8');



require_once('registry/front.class.php');
require_once('registry/action.class.php');
require_once('registry/controller.class.php');



$controller = new Front($registry);
// Router
if (isset($_REQUEST['route'])) {
	$action = new Action($_REQUEST['route']);
} else{
	$action = new Action('Index');
}

$controller->dispatch($action, new Action('error/not_found'));
?>