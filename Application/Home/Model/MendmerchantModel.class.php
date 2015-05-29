<?php 
	/*
		维修机构模型
	*/
	namespace Home\Model;
	use Think\Model;

	class MendmerchantModel extends Model {
		protected $_validate 		= array(
			array('name',		'1,64',		'机构名称1-64内',		self::MUST_VALIDATE,	'length',	self::MODEL_BOTH),
			array('address',	'1,64',		'机构地址1-64内',		self::MUST_VALIDATE,	'length',	self::MODEL_BOTH),
			array('tel',		'1,64',		'电话必须在1-64',		self::MUST_VALIDATE,	'length',	self::MODEL_BOTH),
			array('ment_scope',	'1,64',		'维修范围1-64内',		self::MUST_VALIDATE,	'length',	self::MODEL_BOTH),
			array('introduction','0,256',	'简介256字内',		self::MUST_VALIDATE,	'length',	self::MODEL_BOTH),
		);

		/*
			获取所有的信息
			@param 			$where 筛选条件
							$order 排序条件
							$page  分页
			@return 		array
		*/
		public function getListAll($page,$where=array(),$order='') {
			$info 					= $this
											->field('id,province_id,city_id,name,logo,address,grade,tel,ment_scope,longitude,latitude,merchant_type,introduction,img_ids,add_time,add_admin_id')
											->where($where)
											->order($order)
											->page($page)
											->select();
			
			return $info;
		}

		/*
			获取数量
			@param 			$where 条件
		*/
		public function getCountAll($where=array()) {
			return 	$this->where($where)->count();
		}

		/*
			新增一条数据
		*/
		public function addData($data) {
			return $this->add($data);
		}

		/*
			获取一条数据
		*/
		public function getOneInfo($id) {
			return $this
						->field('id,province_id,city_id,name,logo,address,grade,tel,ment_scope,longitude,latitude,merchant_type,introduction,img_ids,add_time,add_admin_id')
						->where(array('id' => $id))
						->find();
		}

		/*
			修改一条数据
		*/
		public function mofData($id,$data) {
			return $this->where(array('id' => $id))->save($data);
		}

		/*
			删除一条数据
		*/
		public function delOne($id) {
			return $this->where(array('id' => $id))->delete();
		}


	}