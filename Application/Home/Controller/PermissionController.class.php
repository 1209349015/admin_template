<?php
	/*
		权限管理

DROP TABLE IF EXISTS `hr_admin`;
CREATE TABLE `hr_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `is_super` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否为超级管理员,1为超级管理员',
  `role_ids` varchar(255) NOT NULL DEFAULT '' COMMENT '对应的角色表id',
  `pass` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `last_ip` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录ip',
  `last_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- Dumping data for table `hr_admin`
--

LOCK TABLES `hr_admin` WRITE;
INSERT INTO `hr_admin` VALUES (1,'root',1,',','7bacd9f47010938146132f7a0b20e050',2130706433,1431394213),(3,'hello',0,'6,','7bacd9f47010938146132f7a0b20e050',2130706433,1431150397);
UNLOCK TABLES;



DROP TABLE IF EXISTS `hr_mend_merchant`;
CREATE TABLE `hr_mend_merchant` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `province_id` int(11) NOT NULL DEFAULT '0' COMMENT '省=region.id',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '市=region.id',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '商家名称',
  `logo` varchar(40) NOT NULL DEFAULT '' COMMENT '家庭照片,保存相对地址url',
  `address` varchar(64) NOT NULL DEFAULT '' COMMENT '商家地址',
  `grade` tinyint(4) NOT NULL DEFAULT '0' COMMENT '评价星级',
  `tel` varchar(64) NOT NULL DEFAULT '' COMMENT '联系电话，多个逗号隔开',
  `ment_scope` varchar(64) NOT NULL DEFAULT '' COMMENT '维修范围主要是分类',
  `longitude` varchar(16) NOT NULL DEFAULT '' COMMENT '经度',
  `latitude` varchar(16) NOT NULL DEFAULT '' COMMENT '纬度',
  `merchant_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类型  0  未知 1 厂家维修 2 特许 3 特约 4 直营 5个体',
  `introduction` varchar(256) NOT NULL DEFAULT '' COMMENT '介绍',
  `img_ids` varchar(64) NOT NULL DEFAULT '' COMMENT '多个图片id，逗号分割 最多5张图',
  `add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  `add_admin_id` int(11) NOT NULL DEFAULT '0' COMMENT '添加的管理员',
  `update_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  `modifer_admin_id` int(11) NOT NULL DEFAULT '0' COMMENT '添加的管理员',
  PRIMARY KEY (`id`),
  KEY `city` (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='维修机构表';

--
-- Dumping data for table `hr_mend_merchant`
--

LOCK TABLES `hr_mend_merchant` WRITE;
INSERT INTO `hr_mend_merchant` VALUES (7,1,0,'测试','','北京市-朝阳区-电子城科技大厦',5,'123','123','116.49707','39.981025',1,'123','','2015-05-12 11:10:17',1,'0000-00-00 00:00:00',0),(9,1,0,'test','','运城市-闻喜县-山西省闻喜中学校',4,'13522976512','123','111.215482','35.362268',4,'123123','','2015-05-12 14:52:14',1,'2015-05-12 15:01:55',1),(10,1,394,'电子城科技大厦','','北京市-朝阳区-电子城科技大厦',4,'13522223321','猜猜擦','116.49707','39.981025',0,'猜猜擦猜猜擦','','2015-05-12 15:01:05',1,'0000-00-00 00:00:00',0);
UNLOCK TABLES;


DROP TABLE IF EXISTS `hr_permission`;
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '' COMMENT '权限名称',
  `contro_name` char(30) NOT NULL DEFAULT '' COMMENT '控制器名称',
  `action_name` char(30) NOT NULL DEFAULT '' COMMENT '方法名称，父类的方法名为空',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父类的id，0为父类',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否前台展示，0不展示；1展示',
  PRIMARY KEY (`id`),
  KEY `is_show` (`is_show`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='后台管理员权限表';

--
-- Dumping data for table `hr_permission`
--

LOCK TABLES `hr_permission` WRITE;
INSERT INTO `hr_permission` VALUES (10,'新增权限','Permission','addPermission',8,0),(11,'ajax删除权限','Permission','ajaxDel',8,0),(8,'管理员管理','Permission','',0,1),(9,'权限列表','Permission','getPermissionList',8,1),(12,'ajax更新是否前台展示','Permission','ajaxShow',8,0),(13,'角色列表','Permission','getRoleList',8,1),(14,'新增角色','Permission','addRole',8,0),(15,'ajax删除角色','Permission','ajaxDelRole',8,0),(16,'修改角色信息','Permission','mofRoleInfo',8,0),(17,'管理员列表','Permission','adminList',8,1),(18,'管理员新增','Permission','adminAdd',8,0),(19,'删除管理员','Permission','adminDel',8,0),(20,'管理员信息修改','Permission','adminMof',8,0),(21,'公共权限','Index','',0,0),(22,'框架主页面','Index','showIndex',21,0),(23,'退出登录','Login','logout',21,0),(24,'主页面','Index','index',21,0),(25,'用户管理','Users','',0,1),(26,'用户列表','Users','getList',25,1),(27,'维修机构管理','Mendmerchant','',0,1),(28,'机构列表','Mendmerchant','getList',27,1),(29,'新增机构','Mendmerchant','add',27,0),(30,'地址转换为经纬度','Mendmerchant','addressToNums',27,0),(31,'编辑机构','Mendmerchant','mof',27,0),(32,'删除机构','Mendmerchant','del',27,0),(33,'获取机构详情','Mendmerchant','getOneDetail',27,0),(34,'ajax获取评论数据','Mendmerchant','getCommen',27,0);
UNLOCK TABLES;


DROP TABLE IF EXISTS `hr_role`;
CREATE TABLE `hr_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '' COMMENT '角色名称',
  `permission_ids` varchar(255) NOT NULL DEFAULT '' COMMENT '对应权限id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='后台管理员角色表';

--
-- Dumping data for table `hr_role`
--

LOCK TABLES `hr_role` WRITE;
INSERT INTO `hr_role` VALUES (6,'系统管理员','8,9,13,17,21,22,23,24,');
UNLOCK TABLES;
	*/
	namespace Home\Controller;

	class PermissionController extends CommonController {
		private $_permission_model 		= null;

		public function __construct() {
			parent::__construct();
			$this->_permission_model 	= D('permission');
		}

		/*
			获取权限列表
		*/
		public function getPermissionList() {
			$permission_info 			= $this->_getPerList();

			$this->assign('info',$permission_info);
			$this->display('list');														
		}

		/*
			新增权限
		*/
		public function addPermission() {
			if(IS_POST) {
				$data 					= $this->_permission_model->create($_POST);
				if(!$data)
					$this->error($this->_permission_model->getError());

				$insert_res 			= $this->_permission_model->add($data);
				if(!$insert_res)
					$this->error('服务器错误');
				else
					$this->redirect('Permission/getPermissionList');
			}

			//获取主权限信息
			$main_info 					= $this->_permission_model->field('id,name')->where(array('parent_id' => 0))->select();
			if($main_info === false)
				$this->error('服务器查询错误');

			$this->assign('info',$main_info);
			$this->display('add');
		}


		/*
			ajax删除权限
			@param 		id
			@return  	str
		*/
		public function ajaxDel() {
			if(IS_AJAX) {
				$id 			= I('get.id',0,'intval');
				//验证id
				$is_id 			= $this->_permission_model->field('parent_id')->where(array('id' => $id))->find();
				if($is_id === false)
					die('error：服务器查询失败');
				else if($is_id === null)
					die('error：未找到该权限信息');

				//从角色表中获取该权限是否在使用
				$role_model 	= M('role');
				$map['permission_ids'] 			= array('like','%' . $id . ',');
				$is_use 		= $role_model->field('name,permission_ids')->where($map)->select();
				if($is_use === false)
					die('error：服务器查询失败');
				else if($is_use) {
					//如果找到类似的，那么严格判断
					foreach ($is_use as $key => $value) {
						if(in_array($id, explode(',', $value['permission_ids']))) {
							die('error：' . $value['name'] . ' 该角色占用该权限，请先解除');
						}
					}
				}

				if($is_id['parent_id'] == 0) {
					//同时删除子类
					$del_res 	= $this->_permission_model->where(array('parent_id' => $id))->delete();
					if($del_res === false)
						die('error：服务器删除失败');
				}

				//删除数据
				$del_res 		= $this->_permission_model->where(array('id' => $id))->delete();
				if(!$del_res)
					die('error：服务器删除失败');

				echo 1;
			}
		}

		/*
			ajax更新是否前台展示
			@param 				id  数据id，value  数据修改值
			@return 			str
		*/
		public function ajaxShow() {
			if(IS_AJAX) {
				$id 			= I('get.id',0);
				$value 			= I('get.value',0);

				//验证id
				$is_id 			= $this->_permission_model->field('id')->where(array('id' => $id))->find();
				if($is_id === false)
					die('-1');
				else if($is_id === null)
					die('0');

				//更改数据
				$update_res 	= $this->_permission_model->where(array('id' => $id))->save(array('is_show' => $value));
				if($update_res === false)
					die('-1');

				echo 1;
			}
		}


		/*
			新增角色	
		*/
		public function addRole() {
			if(IS_POST) {
				$name 					= I('post.name','','trim');
				$permission_arr 		= I('post.per','');

				if(mb_strlen($name) >= 30 || mb_strlen($name) <= 0)
					$this->error('角色名称不能为空或者大于30位');
				if(empty($permission_arr))
					$this->error('角色权限不能为空');

				//数据入库
				$role_model 			= M('role');

				//验证角色名称是否重复
				$is_only 				= $role_model->field('id')->where(array('name' => $name))->find();
				if($is_only === false)
					$this->error('服务器查询错误');
				else if($is_only)
					$this->error('新增角色失败，角色名称重复');

				$insert_res 			= $role_model->add(array('name' => $name,'permission_ids' => implode(',', $permission_arr) . ','));
				if(!$insert_res)
					$this->error('新增角色失败，服务器错误');

				$this->redirect('Permission/getRoleList');
			}

			$permission_info 			= $this->_getPerList();
			$this->assign('per_info',$permission_info);
			$this->display('add_role');
		}

		/*
			角色列表
		*/
		public function getRoleList() {
			$role_model 			= M('role');
			$role_info 				= $role_model->field('id,name')->select();
			$this->assign('info',$role_info);
			$this->display('role_list');
		}

		/*
			ajax删除角色
		*/
		public function ajaxDelRole() {
			if(IS_AJAX) {
				$role_model 			= M('role');
				$id 					= I('get.value',0);
				//验证id合法性
				$is_id 					= $role_model->field('id')->where(array('id' => $id))->find();
				if($is_id === false)
					die('-1');
				else if($is_id === null)
					die('0');

				//验证管理员是否有正在使用该角色的
				$admin_model 			= M('admin');
				$map['role_ids'] 		= array('like','%' . $id . ',');
				$is_use 				= $admin_model->field('name,role_ids')->where($map)->select();
				if($is_use === false)
					die('-1');
				else if($is_use) {
					//如果找到类似的，那么严格判断
					foreach ($is_use as $key => $value) {
						if(in_array($id, explode(',', $value['role_ids']))) {
							die($value['name']);
						}
					}
				}

				//删除
				$del_res 				= $role_model->where(array('id' => $id))->delete();
				if(!$del_res)
					die('-1');

				echo '1';
			}
		}

		/*
			修改角色信息
			@param 			id role_id
		*/
		public function mofRoleInfo() {
			if(IS_POST) {
				$id 			= I('post.id',0);

				//验证id
				$role_model 	= M('role');
				$is_id 			= $role_model->field('id')->where(array('id' => $id))->find();
				if($is_id === false)
					$this->error('服务器查询错误');
				else if($is_id === null)
					$this->error('非法传值');

				//接收其他参数
				$name 			= I('post.name','','trim');
				$permission_arr	= I('post.per','');

				if(mb_strlen($name) >= 30 || mb_strlen($name) <= 0)
					$this->error('角色名称不能为空或者大于30位');
				if(empty($permission_arr))
					$this->error('角色权限不能为空');

				//验证角色名称
				$map['name'] 	= $name;
				$map['id'] 		= array('neq',$id);
				$is_only 		= $role_model->field('id')->where($map)->find();
				if($is_only === false)
					$this->error('服务器查询错误');
				else if($is_only)
					$this->error('该角色名称已经被占用');

				//修改数据
				$update_res 	= $role_model->where(array('id' => $id))->save(array('name' => $name,'permission_ids' => implode(',', $permission_arr) . ','));
				if($update_res === false)
					$this->error('服务器修改数据错误');

				$this->success('修改角色信息成功',U('Permission/getRoleList'));
				die;
			}

			if(IS_GET) {
				$id 			= I('get.id',0);
				$role_model 	= M('role');
				$is_id 			= $role_model->field('id,name,permission_ids')->where(array('id' => $id))->find();
				if($is_id === false)
					$this->error('服务器查询错误');
				else if($is_id === null)
					$this->error('非法传值');

				$permission_info 			= $this->_getPerList();

				$this->assign('per_info',$permission_info);
				$this->assign('mof_info',$is_id);
				$this->display('add_role');
			}
		}


		/*
			管理员新增
		*/
		public function adminAdd() {
			if(IS_POST) {
				//接收参数
				$name 				= I('post.name','','trim');
				if(mb_strlen($name) <=0 || mb_strlen($name) > 30)
					$this->error('管理员账号必须在30位之内');

				$pass 				= I('post.pass','','trim');
				if(mb_strlen($pass) < 6)
					$this->error('密码至少6位');

				$role_arr 			= I('post.rol','');
				if(!$role_arr)
					$this->error('您必须给该管理分配角色');

				//验证名称是否重复
				$admin_model 		= M('admin');
				$is_only 			= $admin_model->field('id')->where(array('name' => $name))->find();
				if($is_only === false)
					$this->error('服务器查询错误');
				else if($is_only)
					$this->error('该名称已经被占用');

				//入库
				$pass 				= md5(C('PASS_RAND') . $pass);
				$insert_res 		= $admin_model->add(array('name' =>$name ,'pass' => $pass,'role_ids' => implode(',', $role_arr) . ','));
				if(!$insert_res)
					$this->error('服务器新增错误');

				$this->redirect('Permission/adminList');
			}
			//获取所有角色
			$role_model 			= M('role');
			$role_info 				= $role_model->field('id,name')->select();
			if($role_info === false)
				$this->error('服务器查询错误');

			$this->assign('role_info',$role_info);
			$this->display('add_admin');
		}



		/*
			管理员列表
		*/
		public function adminList() {
			$admin_model 		= M('admin');
			$admin_id 			= session(C('ADMIN_ID'));

			if(session('?' . C('ADMIN_SUPER')))
				$admin_info 		= $admin_model->field('id,name,IF(is_super=0,"<span class=\"glyphicon glyphicon-remove\"></span>","<span class=\"glyphicon glyphicon-ok btn_color_share\"></span>") is_super_str,is_super,last_ip,last_time')->order('is_super asc')->select();
			else 
				$admin_info 		= $admin_model->field('id,name,IF(is_super=0,"<span class=\"glyphicon glyphicon-remove\"></span>","<span class=\"glyphicon glyphicon-ok btn_color_share\"></span>") is_super_str,is_super,last_ip,last_time')->where(array('is_super' => 0))->order('is_super asc')->select();
			if($admin_info === false)
				$this->error('服务器查询错误');

			$this->assign('info',$admin_info);
			$this->display('admin_list');
		}

		/*
			删除管理员
		*/
		public function adminDel() {
			$id 				= I('get.value',0);

			//验证id
			$admin_model 		= M('admin');
			$is_id 				= $admin_model->field('id,is_super')->where(array('id' => $id))->find();
			if($is_id === false)
				die('-1');
			else if($is_id === null)
				die('0');

			//超级管理不可以删除
			if($is_id['is_super'] == 1)
				die('0');

			//执行删除
			$del_res 			= $admin_model->where(array('id' => $id))->delete();
			if(!$del_res)
				die('-1');

			echo '1';
		}

		/*
			管理员信息修改
		*/
		public function adminMof() {
			if(IS_POST) {
				$id 				= I('post.id',0);
				$admin_model 		= M('admin');
				$is_id 				= $admin_model->field('id,is_super,role_ids')->where(array('id' => $id))->find();
				if($is_id === false)
					$this->error('服务器查询错误');
				else if($is_id === null)
					$this->error('非法传值');

				//严格验证，只有超级管理可以修改自身
				if($is_id['is_super'] == 1) {
					//获取当前后台用户等级
					$admin_id 		= session(C('ADMIN_ID'));
					$info 			= $admin_model->field('is_super')->where(array('id' => $admin_id))->find();
					if($info === false)
						$this->error('服务器查询错误');
					else if($info === null)
						$this->error('服务器错误');

					if($info['is_super'] != 1)
						$this->error('操作失败，无权限');
				}


				//接收参数
				$name 		= I('post.name','','trim');
				if(mb_strlen($name) <=0 || mb_strlen($name) > 30)
					$this->error('管理员账号必须在30位之内');

				$pass 				= I('post.pass','');
				if($pass) {
					if(mb_strlen($pass) < 6)
						$this->error('密码至少6位');
				}
				$is_super 			= I('post.is_super',0);
				$role_arr 			= I('post.rol','');


				//验证管理员名称是否重复
				$map['id'] 			= array('neq',$id);
				$map['name'] 		= $name;

				$is_only 			= $admin_model->field('id')->where($map)->find();
				if($is_only === false)
					$this->error('服务器查询错误');
				else if($is_only)
					$this->error('管理员账号重复');

				//修改数据
				if($pass)
					$update_res 	= $admin_model->where(array('id' => $id))->save(array('name' => $name,'pass' => md5(C('PASS_RAND') . $pass),'role_ids' => implode(',', $role_arr) . ','));
				else 
					$update_res 	= $admin_model->where(array('id' => $id))->save(array('name' => $name,'role_ids' => implode(',', $role_arr) . ','));

				if($update_res === false)
					$this->error('服务器修改数据错误');

				$this->success('数据修改成功',U('Permission/adminList'));die;
			}

			if(IS_GET) {
				$id 			= I('get.id',0);
				$admin_model 	= M('admin');
				$is_id 			= $admin_model->field('id,name,is_super,role_ids')->where(array('id' => $id))->find();
				if($is_id === false)
					$this->error('服务器查询错误');
				else if($is_id === null)
					$this->error('非法传值');

				//获取角色信息
				$role_model 	= M('role');
				$role_info 		= $role_model->select();

				$this->assign('role_info',$role_info);
				$this->assign('mof_info',$is_id);
				$this->display('add_admin');
			}
		}

		/*
			获取格式化后的权限列表
		*/
		private function _getPerList() {
			$permission_info 			= $this->_permission_model
																	->field('id,name,contro_name,action_name,parent_id,IF(is_show=0,"否","是") is_show')
																	->order('id asc')
																	->select();
			if($permission_info === false)
				$this->error('服务器查询错误');
			else if($permission_info === null)
				$permission_info 		= array();

			$permission_info 			= $this->_listDate($permission_info);

			return $permission_info;
		}






	}