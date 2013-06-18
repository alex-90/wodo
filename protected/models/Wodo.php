<?php

/**
 * This is the model class for table "wodo".
 *
 * The followings are the available columns in table 'wodo':
 * @property integer $id
 * @property string $dt_first
 * @property string $last_updated
 * @property string $mesto
 * @property string $reason
 * @property string $solution
 * @property string $misc
 * @property string $date
 * @property string $status
 * @property integer $user_id
 */
class Wodo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Wodo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wodo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('mesto, reason, misc', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			array('dt_first, last_updated, solution', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dt_first, last_updated, mesto, reason, solution, misc, date, status, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dt_first' => 'Dt First',
			'last_updated' => 'Last Updated',
			'mesto' => 'Mesto',
			'reason' => 'Reason',
			'solution' => 'Solution',
			'misc' => 'Misc',
			'date' => 'Date',
			'status' => 'Status',
			'user_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('dt_first',$this->dt_first,true);
		$criteria->compare('last_updated',$this->last_updated,true);
		$criteria->compare('mesto',$this->mesto,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('solution',$this->solution,true);
		$criteria->compare('misc',$this->misc,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			$this->mesto = $this->clear($this->mesto);
			$this->reason = $this->clear($this->reason);
			$this->misc = $this->clear($this->misc);
			
			return true;
		}
		else
			return false;
	}
	
	
	public function clear($str){
		$str = strip_tags($str);
		$str = trim($str);
		return $str;
	}
}