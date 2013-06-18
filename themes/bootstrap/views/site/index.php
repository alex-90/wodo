<? //$this->renderPartial('_wodo',array('model'=>$model));
//die('yii');
//$this->widget('zii.widgets.CListView', array(



$this->widget('bootstrap.widgets.TbListView', array(
	/*'ajaxUpdate'=>true,
	'dataProvider'=>$book->search(),
	'itemView'=>'_book',
	'pager'=>array('cssFile'=>false, 'class'=>'CLinkPager'),
	*/
	
	'dataProvider'	=>	$dataProvider,
	'itemView'		=>	'_work_view',
	//'template'		=>	'{page}',
	'pager'	=>	array(
		'pageSize'=>2,
	),
	//'enablePagination'=>true,
));

$this->widget('CLinkPager', array(
    //'pages' => $pages,
))?>


<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'resolveProblem')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>
 
<div class="modal-body"></div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Save changes',
        'url'=>'#',
        //'htmlOptions'=>array('data-dismiss'=>'modal'),
		'htmlOptions'=>array('id'=>'Submit'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>