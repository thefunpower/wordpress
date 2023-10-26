<?php  
/**
* init wordpress 
* connect database then use db_* functions and helpers
*/ 
function g_init_wordpress(){ 
	global $g_wp_installed; 
	if(!$g_wp_installed){
		$g_wp_installed = true;  
		$medoo_db_config['db_name'] = DB_NAME; 
		$medoo_db_config['db_host'] = DB_HOST;
		$medoo_db_config['db_user'] = DB_USER;
		$medoo_db_config['db_pwd']  = DB_PASSWORD;
		$medoo_db_config['db_port'] = 3306;  
		/**
		* 启动数据库连接
		*/
		include __DIR__.'/../db_medoo/inc/db/boot.php';  
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );  
	} 
}  

 
function get_req_post($key = "")
{
    $input = get_input();
    $data  = $_POST;
    if ($key) {
        $val = $data[$key];
        if ($input && is_array($input) && !$val) {
            $val = $input[$key];
        }
        return $val;
    } else {
        return $data ?: $input;
    }
} 

function g($key = null)
{
    $val = get_req_post($key);
    if (!$val) {
        $val = $key?$_GET[$key]:$_GET;
    }
    global $config;
    if($config['xss_clean'] == true){
        $val = xss_clean($val);
    }
    return $val;
} 