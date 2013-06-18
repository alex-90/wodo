<?php
/* @var $this WodoController */
/* @var $model Wodo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wodo-_wodo-form',
	'enableAjaxValidation'=>false,
)); */ ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'wodo-_wodo-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	/* 'clientOptions'=>array(
		'validateOnSubmit'=>true,
	), */
)); ?>
	



	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'date'); ?>
	<?php echo $form->textFieldRow($model,'work'); ?>
	<?php echo $form->textAreaRow($model,'info', array(
		'cols'	=>	20,
		'rows'	=>	10,
	)); ?>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->