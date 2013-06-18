<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
	
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>
</head>

<body>
<? $user = User::model()->findByPk(Yii::app()->user->id); ?>
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array(
				'class'=>'pull-right',
			),
            'items'=>array(
                array('label'=>'All', 'url'=>array('/site/index')),
                array('label'=>'New', 'url'=>array('/site/new'), 
					'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Search', 'url'=>array('/site/search')),
                //array('label'=>'Export', 'url'=>array('/site/export')),
				//array('label'=>'Word', 'url'=>array('/site/word')),
				//array('label'=>'Preferences', 'url'=>array('/site/preferences')),
				array('label'=>$user->username . ' [Logout]', 'url'=>array('/login/logout')),
            ),
        ),
    ),
)); ?>

<div class="container" id="page">
	<div class="row">
		<div class="span12">
			<?php echo $content; ?>
		</div>
	</div>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php //echo date('Y'); ?> by My Company. All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
		<? //echo microtime(true); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
