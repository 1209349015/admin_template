<extend name="Base/iframeBase" />
<block name="need_three">
	<link href="__THREEPART__/jquery.raty.css" rel="stylesheet">
</block>
<block name="title">
	<?php if(isset($info)) :?>
		编辑机构 <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">【返回列表】</a> <small class="notice">注： 图片修改，直接重新上传即可</small>
	<?php else :?>
		新增机构 <a href="__URL__/getList">【返回列表】</a>
	<?php endif;?>
</block>
<block name="info">
	<?php if(isset($info)) :?>
		<form class="form-horizontal" action="{:U('Mendmerchant/mof')}" method="post" name="mend">
			<input type="hidden" name="id" value="<?php echo $info['id'];?>" />
	<?php else :?>
		<form class="form-horizontal" action="{:U('Mendmerchant/add')}" method="post" name="mend">
	<?php endif;?>
	
		<div class="col-md-8">
			<div class="form-group">
				<label for="name" class="col-md-2 control-label">商家名称：</label>
				<div class="col-md-10">
					<input type="text" name="name" placeholder="请输入商家名称，64个字以内" id="name" class="form-control" value="<?php if(isset($info)) echo $info['name']?>"/>
				</div>
			</div>

			<?php if(isset($info) && $info['logo']) : ?>
				<div class="form-group">
					<label for="contro_name" class="col-md-2 control-label">商家logo：</label>
					<div class="col-md-10">
						<input type="file" class="form-control" name="logo_img"/>
						<div class="progress" style="display: none;">
							<div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%"></div>
						</div>
						<div class="file_img" >
							<img src="<?php echo $info['logo_path'];?>" class="pic_show" width="150px;" style="display: block;"/>

						</div>
					</div>	
				</div>
			<?php else :?>		
				<div class="form-group">
					<label for="contro_name" class="col-md-2 control-label">商家logo：</label>
					<div class="col-md-10">
						<input type="file" class="form-control" name="logo_img"/>
						<div class="progress" style="display: none;">
							<div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%"></div>
						</div>
						<div class="file_img" >
							<img src="" class="pic_show" width="150px;" style="display:none;"/>
						</div>
					</div>	
				</div>
			<?php endif; ?>

			<div class="form-group">
				<label class="col-md-2 control-label">商家地区：</label>
				<div class="col-md-5">
					<select name="province_id" class="form-control">
						<option value="0">--请选择--</option>
						<?php foreach($area_info as $key => $value) :?>
							<option value="<?php echo $value['id'];?>" <?php if(isset($info) && $info['province_id'] == $value['id']) echo 'selected'?>><?php echo $value['name'];?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="col-md-5">
					<select name="city_id" class="form-control">
						<?php if(isset($info) && $info['city_id']) :?>
							<option value="<?php echo $info['city_id'];?>"><?php echo $info['city_name'];?></option>
						<?php else :?>
							<option>--请选择省份--</option>
						<?php endif;?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="address" class="col-md-2 control-label">商家地址：</label>
				<div class="col-md-9" class="add_input">
					<input type="text" name="address" placeholder="64，请填写带省市的完整地址，方便使用百度查询" id="address" class="form-control" value="<?php if(isset($info)) echo $info['address']?>" autocomplete="off"/>
					<div class="add_message" style="display: none;">
						<ol>
							
						</ol>
					</div>
				</div>
				<div class="col-md-1 add_loading">
					<img src="__IMAGE__/loading.gif" />
				</div>
			</div>

			<div class="form-group">
				<label for="longitude" class="col-md-2 control-label">经度：</label>
				<div class="col-md-10">
					<input type="text" name="longitude" placeholder="经度，百度地图" id="longitude" class="form-control" value="<?php if(isset($info)) echo $info['longitude']?>"/>
				</div>
			</div>

			<div class="form-group">
				<label for="latitude" class="col-md-2 control-label">纬度：</label>
				<div class="col-md-10">
					<input type="text" name="latitude" placeholder="纬度，百度地图" id="latitude" class="form-control" value="<?php if(isset($info)) echo $info['latitude']?>"/>
				</div>
			</div>

			<div class="form-group">
				<label for="grade" class="col-md-2 control-label">评论星级：</label>
				<div class="col-md-10">
					<div class="grade" data-score="<?php if(isset($info)) echo $info['grade']?>"></div>
				</div>
			</div>

			<div class="form-group">
				<label for="tel" class="col-md-2 control-label">联系电话：</label>
				<div class="col-md-10">
					<input type="text" name="tel" placeholder="多个号码用,号隔开，64位内" id="tel" class="form-control" value="<?php if(isset($info)) echo $info['tel']?>"/>
				</div>
			</div>

			<div class="form-group">
				<label for="ment_scope" class="col-md-2 control-label">维修范围：</label>
				<div class="col-md-10">
					<input type="text" name="ment_scope" placeholder="64位内" id="ment_scope" class="form-control" value="<?php if(isset($info)) echo $info['ment_scope']?>"/>
				</div>
			</div>

				
			<div class="form-group">
				<label for="merchant_type" class="col-md-2 control-label">商家类型：</label>
				<div class="col-md-10">
					<input type="radio" name="merchant_type" value="0" <?php if(isset($info['merchant_type']) && $info['merchant_type'] == 0) echo 'checked';else if(!isset($merchant_type)) echo 'checked';?> /> 未知　
					<input type="radio" name="merchant_type" value="1" <?php if(isset($info['merchant_type']) && $info['merchant_type'] == 1) echo 'checked';?> /> 厂家维修　
					<input type="radio" name="merchant_type" value="2" <?php if(isset($info['merchant_type']) && $info['merchant_type'] == 2) echo 'checked';?>/> 特许　
					<input type="radio" name="merchant_type" value="3" <?php if(isset($info['merchant_type']) && $info['merchant_type'] == 3) echo 'checked';?>/> 特约　
					<input type="radio" name="merchant_type" value="4" <?php if(isset($info['merchant_type']) && $info['merchant_type'] == 4) echo 'checked';?>/> 直营　
					<input type="radio" name="merchant_type" value="5" <?php if(isset($info['merchant_type']) && $info['merchant_type'] == 5) echo 'checked';?>/> 个体
				</div>
			</div>

			<div class="form-group">
				<label for="merchant_type" class="col-md-2 control-label">简介：</label>
				<div class="col-md-10">
					<textarea rows="3" class="form-control" id="introduction" name="introduction" placeholder="256个字内，超出将自动截取" ><?php if(isset($info)) echo $info['introduction']?></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-10 col-md-offset-2">
					<input type="submit" class="btn btn-primary btn-block" value="提交" />
				</div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<strong>您可以上传5张说明图</strong>
			<div class="upimg_multi" file_id="<?php if(isset($info) && $info['img_ids_id'][0]) echo $info['img_ids_id'][0];?>">
				<span class="add_multi">+</span>
				<input type="file" />
				<?php if(isset($info) && $info['img_ids_path'][0]) : ?>
					<a class="del_multi">x</a>
					<img src="<?php echo $info['img_ids_path'][0];?>" class="img-thumbnail" style="display: block;"/>
				<?php else : ?>
					<a class="del_multi">x</a>
					<img src="" class="img-thumbnail"/>
				<?php endif;?>
			</div>

			<div class="upimg_multi" style="display: <?php if(isset($info) && $info['img_ids_id'][1]) echo 'block';else echo 'none';?>;" file_id="<?php if(isset($info) && $info['img_ids_id'][1]) echo $info['img_ids_id'][1];?>">
				<span class="add_multi">+</span>
				<input type="file" />
				<?php if(isset($info) && $info['img_ids_path'][1]) : ?>
					<a class="del_multi">x</a>
					<img src="<?php echo $info['img_ids_path'][1];?>" class="img-thumbnail" style="display: block;"/>
				<?php else : ?>
					<a class="del_multi">x</a>
					<img src="" class="img-thumbnail"/>
				<?php endif;?>
			</div>

			<div class="upimg_multi" style="display:<?php if(isset($info) && $info['img_ids_id'][2]) echo 'block';else echo 'none';?>;" file_id="<?php if(isset($info) && $info['img_ids_id'][2]) echo $info['img_ids_id'][2];?>">
				<span class="add_multi">+</span>
				<input type="file" />
				<?php if(isset($info) && $info['img_ids_path'][2]) : ?>
					<a class="del_multi">x</a>
					<img src="<?php echo $info['img_ids_path'][2];?>" class="img-thumbnail" style="display: block;"/>
				<?php else : ?>
					<a class="del_multi">x</a>
					<img src="" class="img-thumbnail"/>
				<?php endif;?>
			</div>

			<div class="upimg_multi" style="display:<?php if(isset($info) && $info['img_ids_id'][3]) echo 'block';else echo 'none';?>;" file_id="<?php if(isset($info) && $info['img_ids_id'][3]) echo $info['img_ids_id'][3];?>">
				<span class="add_multi">+</span>
				<input type="file" />
				<?php if(isset($info) && $info['img_ids_path'][3]) : ?>
					<a class="del_multi">x</a>
					<img src="<?php echo $info['img_ids_path'][3];?>" class="img-thumbnail" style="display: block;"/>
				<?php else : ?>
					<a class="del_multi">x</a>
					<img src="" class="img-thumbnail"/>
				<?php endif;?>
			</div>

			<div class="upimg_multi" style="display:<?php if(isset($info)) echo 'block';else echo 'none';?>;" file_id="<?php if(isset($info) && $info['img_ids_id'][4]) echo $info['img_ids_id'][4];?>">
				<span class="add_multi">+</span>
				<input type="file" />
				<?php if(isset($info) && $info['img_ids_path'][4]) : ?>
					<a class="del_multi">x</a>
					<img src="<?php echo $info['img_ids_path'][4];?>" class="img-thumbnail" style="display: block;"/>
				<?php else : ?>
					<a class="del_multi">x</a>
					<img src="" class="img-thumbnail"/>
				<?php endif;?>
			</div>

			<strong style="display: none;">上传完毕</strong>
		<input type="hidden" name="img_ids" value="" />
	</form>

<script type="text/javascript" src="__THREEPART__/jquery.raty.js"></script>
<script type="text/javascript">
	$('.grade').raty({
		scoreName: 'grade',
		score: function() {
		    return $(this).attr('data-score');
		},
	});
</script>
</block>