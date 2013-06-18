<?php

class SiteController extends Controller
{
	public $layout = "wodo";
	const STATUS_OPENED = 0;
	const STATUS_SUCCESS = 1;
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionNew()
	{	
		$model=new Wodo;
		//$model->date = date('d-m-Y');
		$model->status = self::STATUS_OPENED;
		$model->date = date('Y-m-d');
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='wodo-_wodo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		

		if(isset($_POST['Wodo']))
		{
			$model->attributes=$_POST['Wodo'];
			//$model->dt = date('Y-m-d H:i:s');
			$model->user_id = 1;//Yii::app()->user->id;
			if(!$model->dt_first) $model->dt_first = date('Y-m-d H:i:s');
			$model->last_updated = date('Y-m-d H:i:s');
			
			if($model->validate())
			{
				$model->save();
				//echo "Yii";
				$this->redirect(array('site/index'));
			}
			
		}
		
		$this->render('_wodo',array('model'=>$model));
		
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	public function actionIndex(){
		
		$dataProvider = new CActiveDataProvider('Wodo', array(
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
			'pagination'=>array(
				'pageSize'=>3,
			),
		));
		$this->render('index', array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	
	
	public function actionShow($id){
		$model = Wodo::model()->findByPk($id);
		if(!$model) throw new CHttpException(404);
		
		echo 'yii';
	}
	
	
	public function actionTest(){
		//d(Yii::app()->user);
		echo Yii::app()->user->id;
		
		if(Yii::app()->user->checkAccess('admin')){
			echo "hello, I'm administrator";
		}
	}
	
	
	
	public function actionGetmodal_inner_adm($id){
		$model = Wodo::model()->findByPk($id);
		if(!$model) throw new CHttpException(500);
		
		$this->renderPartial('_adm', array(
			'model'=>$model,
		));
	}
	
	
	
	public function actionUpdate($id){
		$model = Wodo::model()->findByPk($id);
		if(!$model) throw new CHttpException(500);
		
		$model->status = self::STATUS_SUCCESS;
		//$model->date = date('Y-m-d');
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='wodo-_wodo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		

		if(isset($_POST['Wodo']))
		{
			$model->attributes=$_POST['Wodo'];
			$model->user_id = Yii::app()->user->id;
			if(!$model->dt_first) $model->dt_first = date('Y-m-d H:i:s');
			$model->last_updated = date('Y-m-d H:i:s');
			
			if($model->validate())
			{
				$model->save();
				$this->redirect(array('site/index'));
			}
			
		}
		
		$this->render('_wodo',array('model'=>$model));
	}
}