<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/themes/bootstrap/css/login.css" />
	
	<?php Yii::app()->bootstrap->register(); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<script type="text/javascript" src="/themes/bootstrap/js/login.js"></script>
	
</head>

<body>

<div id="main">
	<div id="header"></div>
	
	<div id="content">
	<?php echo $content; ?>
	</div>
	
	<div class="clear"></div>
	
	<div id="footer">

	</div><!-- footer -->
	
</div><!-- main -->

</body>
</html>