<?php
	/*
		维修机构控制器

CREATE TABLE IF NOT EXISTS `hr_mend_merchant` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='维修机构表' AUTO_INCREMENT=30 ;


CREATE TABLE IF NOT EXISTS `hr_mend_merchant_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '市=region.id',
  `merchant_id` int(11) NOT NULL DEFAULT '0' COMMENT '商家=merchant.id',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户=user.id',
  `user_nick_name` varchar(40) NOT NULL DEFAULT '' COMMENT '评论时的用户昵称',
  `content` varchar(256) NOT NULL DEFAULT '' COMMENT '评论内容',
  `add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  `update_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间时间',
  `self_deleted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除标志 0 未删除  1 删除',
  `admin_deleted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除标志 0 未删除  1 删除',
  PRIMARY KEY (`city_id`,`merchant_id`,`id`),
  KEY `merchant` (`merchant_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `hr_region`;
CREATE TABLE `hr_region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '' COMMENT '地区名称',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=488 DEFAULT CHARSET=utf8;

LOCK TABLES `hr_region` WRITE;
INSERT INTO `hr_region` VALUES (1,'北京市',0),(2,'上海市',0),(3,'重庆市',0),(4,'天津市',0),(5,'江苏省',0),(6,'广东省',0),(7,'山东省',0),(8,'辽宁省',0),(9,'河北省',0),(10,'河南省',0),(11,'四川省',0),(12,'黑龙江省',0),(13,'山西省',0),(14,'湖北省',0),(15,'湖南省',0),(16,'陕西省',0),(17,'浙江省',0),(18,'云南省',0),(19,'吉林省',0),(20,'安徽省',0),(21,'广西壮族自治区',0),(22,'江西省',0),(23,'福建省',0),(24,'新疆维吾尔自治区',0),(25,'内蒙古自治区',0),(26,'甘肃省',0),(27,'贵州省',0),(28,'海南省',0),(29,'青海省',0),(30,'宁夏回族自治区',0),(31,'西藏自治区',0),(397,'东城区',1),(396,'丰台区',1),(395,'海淀区',1),(394,'朝阳区',1),(36,'苏州市',5),(37,'无锡市',5),(38,'淮安市',5),(39,'南京市',5),(40,'盐城市',5),(41,'徐州市',5),(42,'宿迁市',5),(43,'泰州市',5),(44,'南通市',5),(45,'常州市',5),(46,'连云港市',5),(47,'扬州市',5),(48,'镇江市',5),(49,'广州市',6),(50,'深圳市',6),(51,'惠州市',6),(52,'佛山市',6),(53,'梅州市',6),(54,'肇庆市',6),(55,'韶关市',6),(56,'揭阳市',6),(57,'汕头市',6),(58,'东莞市',6),(59,'湛江市',6),(60,'中山市',6),(61,'清远市',6),(62,'潮州市',6),(63,'茂名市',6),(64,'珠海市',6),(65,'江门市',6),(66,'阳江市',6),(67,'河源市',6),(68,'汕尾市',6),(69,'云浮市',6),(70,'青岛市',7),(71,'济南市',7),(72,'济宁市',7),(73,'烟台市',7),(74,'潍坊市',7),(75,'淄博市',7),(76,'临沂市',7),(77,'菏泽市',7),(78,'枣庄市',7),(79,'泰安市',7),(80,'聊城市',7),(81,'东营市',7),(82,'威海市',7),(83,'德州市',7),(84,'滨州市',7),(85,'日照市',7),(86,'莱芜市',7),(87,'沈阳市',8),(88,'大连市',8),(89,'锦州市',8),(90,'鞍山市',8),(91,'抚顺市',8),(92,'丹东市',8),(93,'朝阳市',8),(94,'营口市',8),(95,'葫芦岛市',8),(96,'阜新市',8),(97,'辽阳市',8),(98,'铁岭市',8),(99,'本溪市',8),(100,'盘锦市',8),(101,'石家庄市',9),(102,'唐山市',9),(103,'保定市',9),(104,'邯郸市',9),(105,'邢台市',9),(106,'沧州市',9),(107,'张家口市',9),(108,'承德市',9),(109,'廊坊市',9),(110,'衡水市',9),(111,'秦皇岛市',9),(112,'郑州市',10),(113,'洛阳市',10),(114,'南阳市',10),(115,'新乡市',10),(116,'焦作市',10),(117,'周口市',10),(118,'平顶山市',10),(119,'开封市',10),(120,'信阳市',10),(121,'商丘市',10),(122,'安阳市',10),(123,'许昌市',10),(124,'三门峡市',10),(125,'驻马店市',10),(126,'漯河市',10),(127,'濮阳市',10),(128,'鹤壁市',10),(129,'济源市',10),(130,'成都市',11),(131,'绵阳市',11),(132,'乐山市',11),(133,'南充市',11),(134,'宜宾市',11),(135,'甘孜藏族自治州',11),(136,'广元市',11),(137,'凉山彝族自治州',11),(138,'达州市',11),(139,'自贡市',11),(140,'德阳市',11),(141,'攀枝花市',11),(142,'泸州市',11),(143,'雅安市',11),(144,'内江市',11),(145,'阿坝藏族羌族自治州',11),(146,'遂宁市',11),(147,'巴中市',11),(148,'资阳市',11),(149,'广安市',11),(150,'眉山市',11),(151,'哈尔滨市',12),(152,'齐齐哈尔市',12),(153,'牡丹江市',12),(154,'绥化市',12),(155,'大庆市',12),(156,'佳木斯市',12),(157,'鸡西市',12),(158,'伊春市',12),(159,'黑河市',12),(160,'双鸭山市',12),(161,'鹤岗市',12),(162,'大兴安岭地区',12),(163,'七台河市',12),(164,'太原市',13),(165,'运城市',13),(166,'临汾市',13),(167,'大同市',13),(168,'忻州市',13),(169,'晋中市',13),(170,'长治市',13),(171,'吕梁地区',13),(172,'晋城市',13),(173,'阳泉市',13),(174,'朔州市',13),(175,'武汉市',14),(176,'襄樊市',14),(177,'宜昌市',14),(178,'荆州市',14),(179,'黄石市',14),(180,'黄冈市',14),(181,'孝感市',14),(182,'十堰市',14),(183,'咸宁市',14),(184,'恩施土家族苗族自治州',14),(185,'荆门市',14),(186,'随州市',14),(187,'鄂州市',14),(188,'天门市',14),(189,'仙桃市',14),(190,'潜江市',14),(191,'神农架林区',14),(192,'长沙市',15),(193,'衡阳市',15),(194,'湘潭市',15),(195,'株洲市',15),(196,'永州市',15),(197,'邵阳市',15),(198,'岳阳市',15),(199,'郴州市',15),(200,'怀化市',15),(201,'益阳市',15),(202,'常德市',15),(203,'娄底市',15),(204,'湘西土家族苗族自治州',15),(205,'张家界市',15),(206,'西安市',16),(207,'渭南市',16),(208,'咸阳市',16),(209,'宝鸡市',16),(210,'汉中市',16),(211,'延安市',16),(212,'榆林市',16),(213,'安康市',16),(214,'商洛市',16),(215,'铜川市',16),(216,'杭州市',17),(217,'宁波市',17),(218,'温州市',17),(219,'金华市',17),(220,'台州市',17),(221,'绍兴市',17),(222,'嘉兴市',17),(223,'衢州市',17),(224,'丽水市',17),(225,'湖州市',17),(226,'舟山市',17),(227,'昆明市',18),(228,'红河哈尼族彝族自治州',18),(229,'大理白族自治州',18),(230,'曲靖市',18),(231,'昭通市',18),(232,'玉溪市',18),(233,'楚雄彝族自治州',18),(234,'思茅地区',18),(235,'文山壮族苗族自治州',18),(236,'临沧地区',18),(237,'保山市',18),(238,'德宏傣族景颇族自治州',18),(239,'丽江地区',18),(240,'西双版纳傣族自治州',18),(241,'怒江傈僳族自治州',18),(242,'迪庆藏族自治州',18),(243,'长春市',19),(244,'延边朝鲜族自治州',19),(245,'吉林市',19),(246,'通化市',19),(247,'四平市',19),(248,'白城市',19),(249,'辽源市',19),(250,'白山市',19),(251,'松原市',19),(252,'合肥市',20),(253,'淮南市',20),(254,'安庆市',20),(255,'阜阳市',20),(256,'宣城市',20),(257,'芜湖市',20),(258,'蚌埠市',20),(259,'六安市',20),(260,'滁州市',20),(261,'淮北市',20),(262,'宿州市',20),(263,'黄山市',20),(264,'巢湖市',20),(265,'铜陵市',20),(266,'马鞍山市',20),(267,'亳州市',20),(268,'池州市',20),(269,'南宁市',21),(270,'柳州市',21),(271,'桂林市',21),(272,'百色市',21),(273,'河池市',21),(274,'玉林市',21),(275,'梧州市',21),(276,'崇左市',21),(277,'贵港市',21),(278,'来宾市',21),(279,'北海市',21),(280,'钦州市',21),(281,'贺州市',21),(282,'防城港市',21),(283,'南昌市',22),(284,'赣州市',22),(285,'上饶市',22),(286,'吉安市',22),(287,'九江市',22),(288,'宜春市',22),(289,'抚州市',22),(290,'萍乡市',22),(291,'景德镇市',22),(292,'鹰潭市',22),(293,'新余市',22),(294,'福州市',23),(295,'泉州市',23),(296,'南平市',23),(297,'厦门市',23),(298,'漳州市',23),(299,'三明市',23),(300,'龙岩市',23),(301,'莆田市',23),(302,'宁德市',23),(303,'乌鲁木齐市',24),(304,'喀什地区',24),(305,'伊犁哈萨克自治州',24),(306,'巴音郭楞蒙古自治州',24),(307,'昌吉回族自治州',24),(308,'石河子市',24),(309,'塔城地区',24),(310,'和田地区',24),(311,'阿克苏地区',24),(312,'阿勒泰地区',24),(313,'哈密地区',24),(314,'吐鲁番地区',24),(315,'博尔塔拉蒙古自治州',24),(316,'克拉玛依市',24),(317,'克孜勒苏柯尔克孜自治州',24),(318,'阿拉尔市',24),(319,'图木舒克市',24),(320,'五家渠市',24),(321,'呼和浩特市',25),(322,'呼伦贝尔市',25),(323,'赤峰市',25),(324,'通辽市',25),(325,'鄂尔多斯市',25),(326,'乌兰察布市',25),(327,'锡林郭勒盟',25),(328,'巴彦淖尔市',25),(329,'乌海市',25),(330,'兴安盟',25),(331,'阿拉善盟',25),(332,'包头市',25),(333,'兰州市',26),(334,'天水市',26),(335,'陇南地区',26),(336,'平凉市',26),(337,'定西地区',26),(338,'庆阳市',26),(339,'武威市',26),(340,'酒泉市',26),(341,'白银市',26),(342,'张掖市',26),(343,'临夏回族自治州',26),(344,'甘南藏族自治州',26),(345,'金昌市',26),(346,'嘉峪关市',26),(347,'贵阳市',27),(348,'遵义市',27),(349,'毕节地区',27),(350,'黔南布依族苗族自治州',27),(351,'黔东南苗族侗族自治州',27),(352,'安顺市',27),(353,'六盘水市',27),(354,'铜仁地区',27),(355,'黔西南布依族苗族自治州',27),(356,'海口市',28),(357,'儋州市',28),(358,'三亚市',28),(359,'澄迈县',28),(360,'文昌市',28),(361,'琼海市',28),(362,'万宁市',28),(363,'屯昌县',28),(364,'琼中黎族苗族自治县',28),(365,'昌江黎族自治县',28),(366,'乐东黎族自治县',28),(367,'保亭黎族苗族自治县',28),(368,'五指山市',28),(369,'东方市',28),(370,'临高县',28),(371,'定安县',28),(372,'白沙黎族自治县',28),(373,'陵水黎族自治县',28),(374,'琼山市',28),(375,'西宁市',29),(376,'海西蒙古族藏族自治州',29),(377,'海东地区',29),(378,'玉树藏族自治州',29),(379,'果洛藏族自治州',29),(380,'黄南藏族自治州',29),(381,'海南藏族自治州',29),(382,'海北藏族自治州',29),(383,'银川市',30),(384,'吴忠市',30),(385,'石嘴山市',30),(386,'固原市',30),(387,'日喀则地区',31),(388,'那曲地区',31),(389,'拉萨市',31),(390,'山南地区',31),(391,'阿里地区',31),(392,'昌都地区',31),(393,'林芝地区',31),(398,'西城区',1),(399,'昌平区',1),(400,'宣武区',1),(401,'房山区',1),(402,'崇文区',1),(403,'石景山区',1),(404,'门头沟区',1),(405,'通州区',1),(406,'大兴区',1),(407,'顺义区',1),(408,'怀柔区',1),(409,'密云县',1),(410,'平谷区',1),(411,'延庆县',1),(412,'浦东新区',2),(413,'徐汇区',2),(414,'长宁区',2),(415,'闸北区',2),(416,'虹口区',2),(417,'杨浦区',2),(418,'闵行区',2),(419,'宝山区',2),(420,'黄浦区',2),(421,'奉贤区',2),(422,'静安区',2),(423,'卢湾区',2),(424,'普陀区',2),(425,'崇明县',2),(426,'青浦区',2),(427,'嘉定区',2),(428,'金山区',2),(429,'松江区',2),(430,'九龙坡区',3),(431,'万州区',3),(432,'沙坪坝区',3),(433,'渝中区',3),(434,'江北区',3),(435,'南岸区',3),(436,'巴南区',3),(437,'永川市',3),(438,'江津市',3),(439,'綦江县',3),(440,'北碚区',3),(441,'合川市',3),(442,'南川市',3),(443,'涪陵区',3),(444,'渝北区',3),(445,'大渡口区',3),(446,'大足县',3),(447,'长寿区',3),(448,'荣昌县',3),(449,'梁平县',3),(450,'云阳县',3),(451,'璧山县',3),(452,'开县',3),(453,'万盛区',3),(454,'潼南县',3),(455,'垫江县',3),(456,'丰都县',3),(457,'巫溪县',3),(458,'奉节县',3),(459,'铜梁县',3),(460,'忠县',3),(461,'黔江区',3),(462,'巫山县',3),(463,'酉阳土家族苗族自治县',3),(464,'武隆县',3),(465,'城口县',3),(466,'彭水苗族土家族自治县',3),(467,'秀山土家族苗族自治县',3),(468,'双桥区',3),(469,'石柱土家族自治县',3),(470,'和平区',4),(471,'河西区',4),(472,'南开区',4),(473,'河北区',4),(474,'红桥区',4),(475,'河东区',4),(476,'塘沽区',4),(477,'西青区',4),(478,'汉沽区',4),(479,'东丽区',4),(480,'蓟县',4),(481,'大港区',4),(482,'北辰区',4),(483,'武清',4),(484,'津南区',4),(485,'宁河',4),(486,'静海',4),(487,'宝坻',4);
UNLOCK TABLES;
	*/
	namespace Home\Controller;

	class MendmerchantController extends CommonController {
		private $_mend_merchant_model 			= NULL;


		public function __construct(){
			parent::__construct();
			$this->_mend_merchant_model 		= D('MendMerchant');
		}

		/*
			列表
		*/
		public function getList() {
			$name 					= I('get.name','','trim');
			$sort 					= I('get.sort',1,'trim');

			$where 					= array();
			if($name)
				$where['name'] 	= array('like','%'.$name.'%');

			$order 					= $sort == 1 ? 'add_time desc' : 'grade desc';

			//获取列表
			$count 					= $this->_mend_merchant_model->getCountAll($where);
			$info 					= $this->_mend_merchant_model->getListAll($this->_page($count),$where,$order);

			if($info === false)
				$this->error('服务器查询失败');

			//循环读取评论数
			$mend_merchant_comment_model 		= M('mend_merchant_comment');
			foreach ($info as $key => $value) {
				$info[$key]['comment_count'] 			= $mend_merchant_comment_model->where(array('merchant_id' => $value['id'],'self_deleted' => 0,'admin_deleted' => 0))->count();
			}

			$this->assign('filter',array(
											'name' 			=> $name,
											'sort' 			=> $sort,
										));
			$this->_pageIndex($count);
			$this->assign('info',$info);
			$this->display('list');
		}

		/*
			新增
		*/
		public function add() {
			if(IS_POST) {
				$data 			= $this->_mend_merchant_model->create($_POST);
				if(!$data)
					$this->error($this->_mend_merchant_model->getError());

				//获取机构名是否重复
				if($this->_mend_merchant_model->getCountAll(array('name' => $data['name'])))
					$this->error('机构名称重复');

				//补充数据
				$data['tel'] 			= str_replace('，', ',', $data['tel']);
				$data['add_time'] 		= date('Y-m-d H:i:s',time());
				$data['add_admin_id'] 	= session(C('ADMIN_ID'));
				$data['img_ids'] 		= trim($data['img_ids'],',');

				$insert_res 	= $this->_mend_merchant_model->addData($data);
				if(!$insert_res)
					$this->error('服务器新增数据失败');

				$this->redirect('Mendmerchant/getList');
			}
			//获取地区信息
			$area_info 			= unserialize($this->_getArea());
			$area_info_new 		= null;
			foreach ($area_info as $key => $value) {
				if($value['parent_id'] == 0) {
					$area_info_new[] 	= $value;
 				}
			}

			$this->assign('area_info',$area_info_new);
			$this->display('add');
		}


		/*
            地址转换为经纬度
            ak EkmwkVyCUSGRADzjE5P7aXA4,自己申请
        */
        public function addressToNums() {
        	$address 			= I('get.add','','trim');
        	if($address) {
	            //拼接url
	          	$http  			= 'http://api.map.baidu.com/place/v2/suggestion?query='.$address.'&region=全国&output=json&ak=' . C('BAIDU_KEY');
	        	echo file_get_contents($http);
	        }
        }


        /*
			编辑
        */
		public function mof() {
			if(IS_POST) {
				$data 			= $this->_mend_merchant_model->create($_POST);
				if(!$data)
					$this->error($this->_mend_merchant_model->getError());
				//补充数据
				$id 						= I('post.id',0,'intval');
				if($id <= 0)
					$this->error('非法传值');

				//获取机构名是否重复
				if($this->_mend_merchant_model->getCountAll(array('name' => $data['name'],'id' => array('neq',$id))))
					$this->error('机构名称重复');

				$data['tel'] 				= str_replace('，', ',', $data['tel']);
				$data['update_time'] 		= date('Y-m-d H:i:s',time());
				$data['modifer_admin_id'] 	= session(C('ADMIN_ID'));
				$data['img_ids'] 			= trim($data['img_ids'],',');

				$update_res 				= $this->_mend_merchant_model->mofData($id,$data);
				if($update_res === false)
					$this->error('服务器新增数据失败');

				$this->success('修改成功',U('Mendmerchant/getList'));
			}
			if(IS_GET) {
				$id 			= I('get.id',0,'intval');
				if($id <= 0)
					$this->error('非法操作');

				$info 		= $this->_mend_merchant_model->getOneInfo($id);
				if($info === false)
					$this->error('服务器查询数据失败');
				else if($info === null)
					$this->error('无此数据');

				//获取图片
				if($info['logo'])
					$info['logo_path'] 		= $this->_getImgById($info['logo']);
				if($info['img_ids']) {
					$temp_arr 	= explode(',', trim($info['img_ids'],','));
					foreach ($temp_arr as $key => $value) {
						if(empty($value))
							continue;
						$info['img_ids_path'][] 		= $this->_getImgById($value);
						$info['img_ids_id'][] 			= $value;
					}
				}

				//地区信息
				$area_info 			= unserialize($this->_getArea());
				$area_info_new 		= null;
				foreach ($area_info as $key => $value) {
					if($value['parent_id'] == 0) {
						$area_info_new[] 	= $value;
	 				}
	 				if($value['id'] == $info['city_id'])
	 					$info['city_name'] 		= $value['name'];
				}

				$this->assign('area_info',$area_info_new);

				$this->assign('info',$info);
				$this->display('add');
			}
		}

		/*
			删除一个机构
		*/
		public function del() {
			if(!IS_AJAX)
				die('error: 非法请求');
			$id 			= I('get.id',0,'intval');
			if($id <= 0)
				die('error: 非法操作');

			$del_res 		= $this->_mend_merchant_model->delOne($id);
			if(!$del_res)
				die('error: 服务器删除数据失败');

			//删除该机构对应的评论信息
			$mend_merchant_comment_model 		= M('mend_merchant_comment');
			$del_res 							= $mend_merchant_comment_model->where(array('merchant_id' => $id))->delete();
			if($del_res === false)
				die('error: 服务器删除对应评论失败');

			echo 'ok';
		}

		/*
			获取详情
		*/
		public function getOneDetail() {
			$id 			= I('get.id',0,'intval');
			if($id <= 0)
				$this->error('非法操作');

			//获取详情
			$info 			= $this->_mend_merchant_model->getOneInfo($id);
			if($info === false)
				$this->error('服务器查询数据失败');
			else if($info === null)
				$this->error('无此数据');	

			//获取图片
			if($info['logo'])
				$info['logo_path'] 		= $this->_getImgById($info['logo'],2);

			if($info['img_ids']) {
				$temp_arr 	= explode(',', trim($info['img_ids'],','));
				foreach ($temp_arr as $key => $value) {
					if(empty($value))
						continue;
					$info['img_ids_path'][] 		= $this->_getImgById($value,2);
					$info['img_ids_id'][] 			= $value;
				}
			}

			//获取管理员信息
			$admin_model 	= M('admin');
			if($info['add_admin_id']) {
				$admin_info 						= $admin_model->field('name')->where(array('id' => $info['add_admin_id']))->find();
				if(!$admin_info)
					$this->error('查询添加人信息失败，服务器错误');
				$info['add_admin_name'] 			= $admin_info['name'];
			}

			$admin_info 							= null;
			if($info['modifer_admin_id']) {
				$admin_info 						= $admin_model->field('name')->where(array('id' => $info['modifer_admin_id']))->find();
				if(!$admin_info)
					$this->error('查询添加人信息失败，服务器错误');
				$info['modifer_admin_name'] 		= $admin_info['name'];
			}else {
				$info['modifer_admin_name'] 		= '无';
				$info['update_time'] 				= '无';
			} 

			//机构类别
			switch ($info['merchant_type']) {
				case '0':
					$info['merchant_type_str'] 		= '未知';
					break;
				case '1':
					$info['merchant_type_str'] 		= '厂家维修';
					break;
				case '2':
					$info['merchant_type_str'] 		= '特许';
					break;
				case '3':
					$info['merchant_type_str'] 		= '特约';
					break;
				case '4':
					$info['merchant_type_str'] 		= '直营';
					break;
				case '5':
					$info['merchant_type_str'] 		= '个体';
					break;
			}

			//评论数
			$mend_merchant_comment_model	= M('mend_merchant_comment');
			$info['comment_count'] 			= $mend_merchant_comment_model->where(array('merchant_id' => $info['id'],'self_deleted' => 0,'admin_deleted' => 0))->count();
				
			$this->assign('info',$info);
			$this->display('detail');
		}

		/*
			ajax获取评论数据
			@param 		merchant_id 机构id
		*/
		public function getCommen() {
			if(!IS_AJAX)
				die(json_encode('error: 非法请求'));
			$id  			= I('get.id',0,'intval');
			if($id <= 0)
				die('error: 非法传值');
			$page_num 		= I('get.page_num',1,'intval');
			$page 			= $page_num . ',' . C('PAGE_SIZE');

			$mend_merchant_comment_model 			= M('mend_merchant_comment');
			$count 									= $mend_merchant_comment_model->where(array('merchant_id' => $id,'self_deleted' => 0,'admin_deleted' => 0))->count();
			$info 									= $mend_merchant_comment_model
																					->field('user_nick_name,content,add_time')
																					->where(array('merchant_id' => $id,'self_deleted' => 0,'admin_deleted' => 0))//0表示未被删除的
																					->page($page)
																					->order('add_time desc')
																					->select();
			if($info === false)
				die(json_encode('error: 服务器查询失败'));
			else if($info === null)
				die(json_encode('error: 无评论内容'));

			//拼接html
			$html 			= '';
			foreach ($info as $key => $value) {
				$html 		.= '<blockquote>';
				$html 		.= '<p>'.$value['content'].'</p>';
				$html 		.= '<footer>'.$value['user_nick_name'].'　　<cite title="Source Title">'.$value['add_time'].'</cite></footer></blockquote>';
			}

			$page_max 		= ceil($count / C('PAGE_SIZE'));

			//判断分页
			if($page_num >= $page_max) 
				$html 		.= '<p class="btn btn-sm btn-warning">——OVER——</p>';
			else 
				$html 		.= '<p class="com_more btn btn-sm btn-primary" id="'.$id.'" page_num="'.$page_num.'">加载更多，还余'.($page_max - $page_num).'页</p>';

			echo json_encode(array('html' => $html, 'page_max' => $page_max));
		}

		/*
			ajax 读取地区二级区域
		*/
		public function getSArea() {
			$id 				= I('get.id',0,'intval');

			$area_info 			= unserialize($this->_getArea());
			$area_info_new 		= null;
			foreach ($area_info as $key => $value) {
				if($value['parent_id'] == $id) {
					$area_info_new[] 	= $value;
 				}
			}

			echo json_encode($area_info_new);

		}











	}