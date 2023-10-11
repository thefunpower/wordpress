# wordpress开发包
 
 
## 安装

~~~
composer require thefunpower/wordpress
~~~

## wordpress插件

~~~
define("EXPRESS_VERSION",'1.0.0');  
define('EXPRESS__DIR', plugin_dir_path( __FILE__ ) );
if(!defined('PATH')){
	define("PATH",__DIR__.'/../../..'); 	
}
date_default_timezone_set('Asia/Shanghai');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);  
// autoloader
global $g_autoloader;
if(!$g_autoloader){
	$g_autoloader = include __DIR__.'/vendor/autoload.php';	
}
$g_autoloader->addPsr4("Express\\",__DIR__.'/lib/');  
//加载composer助手包 
g_init_wordpress(); 

// redis 
$host = '127.0.0.1';
$port = 6379;
$auth = '';
predis($host,$port,$auth);
$redis = predis(); 

/**
* 加载语言包
*/
$lang = 'zh-cn';
lib\Validate::lang($lang); 
~~~ 
 

### 开源协议 

[LICENSE](LICENSE.md)
 