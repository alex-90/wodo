<?php
/* @var $this WodoController */
/* @var $model Wodo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wodo-_wodo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="span4">
			<?php echo $form->labelEx($model,'date'); ?>
			<?php echo $form->textField($model,'date'); ?>
			<?php echo $form->error($model,'date'); ?>
		</div>
	</div>
	
	<b>Mesto: </b><?=$model->mesto?><br />
	<b>Reason: </b><?=$model->reason?><br />
	<b>Misc: </b><?=$model->misc?><br />

	<div class="row">
		<div class="span4">
			<?php echo $form->labelEx($model,'solution'); ?>
			<?php echo $form->textField($model,'solution'); ?>
			<?php echo $form->error($model,'solution'); ?>
		</div>
	</div>
	
	<input type="hidden" name="Wodo[id]" value="<?=$model->id?>"/>

<?php $this->endWidget(); ?>

</div><!-- form -->