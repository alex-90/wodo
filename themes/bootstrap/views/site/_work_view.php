<? $colors=array(
	'yellow',
	'green',
); 
if($data->status==0 && (time()-strtotime($data->last_updated) > 3*24*3600)){
	$color = 'red';
} else {
	$color = $colors[$data->status];
}

?><div class="<?=$color?>">
	<b>ID: </b><? echo CHtml::link($data->id, array('site/show',
		'id'=>$data->id,
	)); ?>&nbsp;&nbsp;&nbsp;<b>Created: </b><?=$data->dt_first?>&nbsp;&nbsp;&nbsp;
	<b>Mesto: </b><?=$data->mesto?>&nbsp;&nbsp;&nbsp;
	<b>Last Updated: </b><?=$data->last_updated?><br />
	<b>Reason: </b><?=$data->reason?><br />
	<b>Misc: </b><?=$data->misc?><br /><br />
	<b>Date: </b><?=$data->date?>&nbsp;&nbsp;&nbsp;
	<b>Solution: </b><?=$data->solution?><br />

	<? if(Yii::app()->user->checkAccess('admin') 
			&& ($data->status==0 
				|| ($data->status==1 && (time()-strtotime($data->last_updated) < 15*60)
			)
		)
	): ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>$data->status==0 ? 'Resolve' : 'Update',
		'type'=>'primary',
		'htmlOptions'=>array(
			//'data-toggle'=>'modal',
			'data-target'=>'#resolveProblem',
			'data-id'=>$data->id,
			'class'=>'resolveProblem',
		),
	)); ?>
	
	<? endif; ?>
	
	
	<? if(Yii::app()->user->role == 'user' && (time()-strtotime($data->last_updated) < 15*60)): ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'Update',
		'type'=>'primary',
		'url'=>array('/site/update', 'id'=>$data->id),
		'htmlOptions'=>array(
			//'data-toggle'=>'modal',
			//'data-target'=>'#resolveProblem',
			//'data-id'=>$data->id,
			//'class'=>'resolveProblem',
		),
	)); ?>
	
	<? endif; ?>
</div>
<hr />