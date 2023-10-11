<?php 

global $g_wp_installed;
if(!$g_wp_installed){
	$g_wp_installed = true; 
	/**
	* 数据库连接
	*/
	if(defined('DB_NAME')){
		g_init_wordpress(); 
	} 
	/**
	* 初始化
	*/
	function g_init_wordpress(){
		$medoo_db_config['db_name'] = DB_NAME; 
		$medoo_db_config['db_host'] = DB_HOST;
		$medoo_db_config['db_user'] = DB_USER;
		$medoo_db_config['db_pwd']  = DB_PASSWORD;
		$medoo_db_config['db_port'] = 3306;  
		/**
		* 启动数据库连接
		*/
		include __DIR__.'/../db_medoo/inc/db/boot.php'; 
		include __DIR__.'/../core/helper.php';  
		add_action( 'init', "express_install");   
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 

	    function g($key = ''){
		   	if($key){
		   		return $_POST[$key];
		   	}
		   	return $_POST;
		}

	    function guzzle_http($click_option = [])
		{
		    $click_option['timeout'] = $click_option['timeout'] ?: 60;
		    $client = new \GuzzleHttp\Client($click_option);
		    return $client;
		}
	}

}