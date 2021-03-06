<?php
return array(
	//设置模版后缀(仅仅后台使用)
	'TMPL_TEMPLATE_SUFFIX'		=> '.tpl',

	//设置模板替换变量
	'TMPL_PARSE_STRING' 		=> array(
											'__CSS__' 						=> __ROOT__ . '/Public/' . MODULE_NAME . '/Css',
											'__IMAGE__' 					=> __ROOT__ . '/Public/' . MODULE_NAME . '/Image',
											'__JS__' 						=> __ROOT__ . '/Public/' . MODULE_NAME . '/Js',
											'__THREEPART__' 				=> __ROOT__ . '/Public/' . MODULE_NAME . '/Three_part',
										),
	//动态加载js，css目录
	'BASE_CSS' 					=> './Public/' . MODULE_NAME. '/Css/',
	'BASE_JS' 					=> './Public/' . MODULE_NAME. '/Js/',

	//错误提示页面
	'TMPL_ACTION_ERROR' 		=> 'Dispatch/jump',
	'TMPL_ACTION_SUCCESS' 		=> 'Dispatch/jump',

	//后台密码参杂
	'PASS_RAND'            		=> 'oLII!Ai8llyYQDqlliY',

	//管理员session
	'ADMIN_ID' 		 			=> 'admin_id',
	'ADMIN_NAME' 				=> 'admin_name',
	'ADMIN_RULE' 				=> 'admin_rule',
	'ADMIN_SUPER' 				=> 'admin_super',

	/*文件上传目录*/
    'FILE_IMG_DIRNAME'          => MODULE_NAME . '/images/',
    'FILE_VOICE_DIRNAME'        => MODULE_NAME . '/voice/',
    'FILE_VEDIO_DIRNAME'        => MODULE_NAME . '/vedio/',
    'FILE_TXT_DIRNAME'          => MODULE_NAME . '/txt/',

    /*压缩图大小限制*/
    'THUMB_MAX_WIDTH'           => '150',
    'THUMB_MAX_HEIGHT'          => '150',
    
    /*百度开发者key*/
    'BAIDU_KEY' 				=> 'EkmwkVyCUSGRADzjE5P7aXA4',

    /*页码信息*/
    'PAGE_SIZE' 				=> 2,


);