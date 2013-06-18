<div id="logindiv">
	<form action="<? echo $this->createUrl('login/identity'); ?>" method="post">
		<div id="loginform">
			<? if(isset($error)) echo '<h3 class="error">' . $error . '</h3>'; ?>
			<input type="text" name="username" placeholder="Логин"/>
			<input type="password" name="password" placeholder="Пароль"/><br />
			
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Кіру/Вход')); ?>
		</div>
	</form>
</div>