<extend name="Base/iframeBase" />
<block name="title">
	<strong><?php echo $info['name'] ?></strong> 详情 <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">【返回上一页】</a> 
</block>
<block name="info">
	<div class="col-md-2">
		<p class="thumbnail">
			<?php if(isset($info['logo_path'])) :?>
				<a href="<?php echo $info['logo_path'];?>" target="_blank"><img src="<?php echo $info['logo_path'];?>" /></a>
			<?php else: ?>
				<span>暂无logo</span>
			<?php endif;?>
		</p>
		<p class="nick text-center"><?php echo $info['name'];?></p>
	</div>
	<div class="col-md-10">
		<table class="table table-bordered">
			<tr><td width="120" class="bg_share">名称：</td><td><?php echo $info['name'];?></td></tr>
			<tr><td width="120" class="bg_share">名称：</td><td><?php echo $info['address'];?></td></tr>
			<tr><td width="120" class="bg_share">星级：</td><td><div class="grade" data-score="<?php echo $info['grade'] ?>"></div></td></tr>
			<tr><td width="120" class="bg_share">联系电话：</td><td><?php echo $info['tel'];?></td></tr>
			<tr><td width="120" class="bg_share">维修范围：</td><td><?php echo $info['ment_scope'];?></td></tr>
			<tr><td width="120" class="bg_share">机构类别：</td><td><?php echo $info['merchant_type_str'];?></td></tr>
			<tr><td width="120" class="bg_share">添加人：</td><td><?php echo $info['add_admin_name'];?> (<small><?php echo $info['add_time'];?></small>)</td></tr>
			<tr><td width="120" class="bg_share">最后修改人：</td><td><?php echo $info['modifer_admin_name'];?> (<small><?php echo $info['update_time'];?></small>)</td></tr>
		</table>

		<div class="imgs" style="margin-bottom:15px;">
			<?php if(isset($info['img_ids_path'])) : ?>
				<?php foreach ($info['img_ids_path'] as $key => $value) : ?>
					<a href="<?php echo $value;?>" target="_blank"><img src="<?php echo $value;?>" class="img-thumbnail" width="75px"/></a>
				<?php endforeach;?>
			<?php endif;?>
		</div>

		<div class="panel panel-info">
			<div class="panel-heading cursor get_commen" id="<?php echo $info['id'];?>" count="<?php echo $info['comment_count'];?>">
				<h3 class="panel-title"><span class="glyphicon glyphicon-zoom-in"></span> 查看评论 （<?php echo $info['comment_count'];?> 条）</h3>
			</div>
			<div class="panel-body commen_his" style="display: none;"></div>
		</div>
	</div>
<script type="text/javascript" src="__THREEPART__/jquery.raty.js"></script>
<script type="text/javascript">
	$('.grade').raty({
		readOnly : true,
		score: function() {
		    return $(this).attr('data-score');
		},
	});
</script>
</block>