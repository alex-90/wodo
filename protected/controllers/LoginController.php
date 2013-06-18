<?php

class LoginController extends Controller
{
	public $layout='login';
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionIdentity(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//d($password);
		
		$identity=new UserIdentity($username,$password);
		
		if($identity->authenticate()){
			if(!Yii::app()->user->login($identity,3600*24*1)) throw new CHttpException (503);  
			
			$this->redirect(array('site/index'));
		} else {
			$this->render('_form_login', array(
				'error'=>'Неверный логин или пароль!',
			));
		}
	}

	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(array('login/index'));
	}

}