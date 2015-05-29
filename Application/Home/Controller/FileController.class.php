<?php
	/*
		后台文件上传类
CREATE TABLE IF NOT EXISTS `hr_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文件id',
  `family_id` int(11) NOT NULL DEFAULT '0' COMMENT '家庭=family_id`.id',
  `visible_flag` int(11) NOT NULL DEFAULT '0' COMMENT '可见人的 2的user_index次幂的位或运算 0 全体',
  `filemd5` char(32) NOT NULL DEFAULT '' COMMENT '文件特征码',
  `add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  `effect` int(11) NOT NULL COMMENT '文件状态',
  `effect_time` int(11) NOT NULL DEFAULT '0' COMMENT '生效时间',
  `file_title` varchar(128) NOT NULL DEFAULT '',
  `file_desc` varchar(128) NOT NULL DEFAULT '',
  `file_dir` varchar(256) NOT NULL DEFAULT '',
  `thumb_img_dir` varchar(256) NOT NULL DEFAULT '',
  `file_name` varchar(128) NOT NULL DEFAULT '' COMMENT '文件名称',
  `file_type` tinyint(11) NOT NULL DEFAULT '0' COMMENT '文件类型（1：图片；2：音频；3：视频；4文本；）',
  `add_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '添加用户',
  `add_user_name` varchar(32) NOT NULL DEFAULT '' COMMENT '添加用户名称',
  `audio_time` int(10) NOT NULL DEFAULT '0' COMMENT '音频类型文件的时长 秒为单位',
  PRIMARY KEY (`family_id`,`file_id`),
  KEY `filemd5` (`filemd5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传文件表' AUTO_INCREMENT=1 ;
	*/
	namespace Home\Controller;

	class FileController extends CommonController {
		private $_file_model 			= null;

		public function __construct() {
			parent::__construct();
			$this->_file_model 			= M('file');
		}



		public function upload() {
			if(!IS_AJAX)
				die('error：非法请求');
			//获取参数
			$param 						= I('post.param','param','trim');//如果没有传，默认为param
			$thumb_width 				= I('post.thumb_width',C('THUMB_MAX_WIDTH'));
			$thumb_height 				= I('post.thumb_height',C('THUMB_MAX_HEIGHT'));

			//引入上传类
			$upload 					= new \Think\Upload();
			$upload->maxSize 			= 3145728;
			$upload->rootPath 			= C('FILE_ROOT_PATH');
			$upload->allowExts 			= array('jpeg','png','gif','jpg');
			$upload->savePath 			= C('FILE_UPLOAD_PATH') . C('FILE_IMG_DIRNAME') . date('Y',time()) .'/'. date('md',time()) .'/';

			//自动创建目录失败，手动创建
			if(!is_dir($upload->rootPath . $upload->savePath))
				mkdir($upload->savePath,0777,true);
			$upload->saveRule 			= uniqid();
			$upload->subName 			= date('Hi',time());
			$info 						= $upload->upload();

			if(!$info)
				die('error: ' . $upload->getError());

			//加入拼接好的图片dir
			$info[$param]['img_dir'] 				= $info[$param]['savepath'] . $info[$param]['savename'];
			//如果是图片类型，那么生成缩略图
			$image_obj 				= new \Think\Image();
			$image_obj->open(C('FILE_ROOT_PATH') . $info[$param]['img_dir']);
			$thumb_file_dir 		= C('FILE_ROOT_PATH') . $info[$param]['savepath']  . C('THUMB_PRE') .$info[$param]['savename'];
			$image_obj->thumb($thumb_width, $thumb_height,\Think\Image::IMAGE_THUMB_FILLED)->save($thumb_file_dir);

			if(file_exists($thumb_file_dir))
				$info[$param]['thumb_img'] 		= $info[$param]['savepath'] . C('THUMB_PRE') .$info[$param]['savename'];
			else 
				die('error:操作失败：缩略图生成错误');

			//拼接数据入库
			$data['filemd5'] 			= $info[$param]['md5'];
			$data['add_time'] 			= date('Y-m-d H:i:s',time());
			$data['file_dir'] 			= $info[$param]['savepath'] . $info[$param]['savename'];;
			$data['add_user_id'] 		= 0;
			$data['add_user_name'] 		= '';
			$data['family_id'] 			= 0;
			$data['thumb_img_dir'] 		= $info[$param]['thumb_img'] ? $info[$param]['thumb_img'] : '';

			$insert_res 				= $this->_file_model->add($data);
			if(!$insert_res)
				die('操作失败：服务器错误');

			$file_id 					= $this->_file_model->where(array('filemd5' => $data['filemd5']))->find();
			if(!$file_id)
				die('操作失败：服务器错误');

			echo json_encode(array('file_id' => $file_id['file_id'], 'thumb_img_dir' => C('HTTP_URL') . $data['thumb_img_dir']));			
		}

	}