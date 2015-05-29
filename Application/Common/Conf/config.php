<?php
//全局配置信息
return array(

	//数据库连接
	'DB_TYPE' 				=> 'mysql',
	'DB_HOST' 				=> '127.0.0.1',
	'DB_NAME' 				=> 'test',
	'DB_USER' 				=> 'root',
	'DB_PWD' 				=> '123456',
	'DB_PREFIX' 			=> 'hr_',
	'DB_CHARSET' 			=> 'utf8',
	'DB_DEBUG' 	 			=> TRUE,		//记录sql日志,关闭调试模式后失效
	'DB_FIELDS_CACHE'		=> FALSE,		//字段缓存；调试模式设置为false，上线设置为true

	//日志记录(调试模式下记录全部日志，关闭调试模式后，记录log_level类别的日志)
	'LOG_RECORD'			=> TRUE,
	'LOG_LEVEL' 			=> 'EMERG,ALERT,CRIT,ERR,WARN',

	//静态缓存即html文件静态缓存
	'HTML_CACHE_ON' 		=> FALSE,

	//设置可访问目录
	'MODULE_ALLOW_LIST'		=> array('Home','Homeface'),
	//设置默认目录
	'DEFAULT_MODULE'		=> 'Home',

	//url 模式
	'URL_CASE_INSENSITIVE'	=> true,		//不区分大小写
	'URL_MODEL'				=> '2',  		//REWRITE模式,抛弃index.php

	/*网站http路径*/
	'HTTP_URL'                  => 'http://' . $_SERVER['HTTP_HOST'] . str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']))  .'/Public/',
   
   	/*上传文件主配置*/
    'FILE_ROOT_PATH' 			=> './Public/',
    'FILE_UPLOAD_PATH'          => 'Uploads/',
    'THUMB_PRE'                 => 'thumb_',

    /*默认头像文件路径*/
    'DEFAULT_HEADER' 			=> 'Homeface/Image/default_head.jpg',

);