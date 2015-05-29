<extend name="Base/iframeBase" />
<block name="need_three">
	<link href="__THREEPART__/jquery.raty.css" rel="stylesheet">
</block>
<block name="title">
	维修机构列表
	<a class="glyphicon glyphicon-plus btn btn-xs btn-danger pull-right tooltip_class" data-toggle="tooltip" data-placement="bottom" title="新增" href="__URL__/add"></a>
</block>
<block name="info">
	<div class="jumbotron">
		<form class="form-inline">
			<div class="form-group">
				<input type="text" class="form-control" name="name" placeholder="筛选机构名" value="<?php if(isset($filter)) echo $filter['name'] ?>"/>
			</div>
			　
			<div class="form-group">
				<input type="radio" name="sort" value="1" <?php if(isset($filter) && $filter['sort'] == 1)  echo 'checked';?>/> 添加时间倒排
				<input type="radio" name="sort" value="2" <?php if(isset($filter) && $filter['sort'] == 2)  echo 'checked';?>/> 评价星级倒排
			</div>
			　
			<div class="form-group">
				<button type="submit" class="btn btn-success btn-sm">提交</button>
				<button type="submit" class="btn btn-success btn-sm reset_form">重置</button>
			</div>
		</form>
	</div>
	<?php if(empty($info)) :?>
		<span>没有任何信息</span>
	<?php else : ?>
		<table class="table table-bordered table-hover">
		<thead>
			<tr><th>编号</th><th>名字</th><th>地址</th><th>评论数</th><th>评价星级</th><th>添加时间</th><th>操作</th></tr>
		<thead>
		<tbody>
			<?php foreach ($info as $key => $value) :?>
				<tr>
					<td><?php echo $index++ ?></td>
					<td title="<?php echo $value['name']?>"><?php if(mb_strlen($value['name'],'utf8') >= 15) echo mb_substr($value['name'], 0, 15,'utf8') . '...';else echo $value['name'];?></td>
					<td title="<?php echo $value['address']?>"><?php if(mb_strlen($value['address'],'utf8') >= 25) echo mb_substr($value['address'], 0, 25,'utf8') . '...';else echo $value['address'];?></td>
					<td><?php echo $value['comment_count'];?></td>
					<td><div class="grade" data-score="<?php echo $value['grade'] ?>"></div></td>
					<td><?php echo $value['add_time'];?></td>
					<td><a href="__URL__/getOneDetail/id/<?php echo $value['id'] ?>" class="btn btn-xs btn-primary">详情</a>｜<a href="__URL__/mof/id/<?php echo $value['id'] ?>" class="btn btn-xs btn-primary">编辑</a>｜<a id="<?php echo $value['id'] ?>" class="del_mend btn btn-xs btn-primary">删除</a></td>
				</tr>
			<?php endforeach;?>
			<tr><td colspan="7" class="page_class"><?php echo $page ?></td></tr>
		</tbody>
		</table>
	<?php endif; ?>
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