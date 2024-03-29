<?php

class User extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANED=-1;
	
	public $username;
	public $password;
	public $email;
	
	/**
	 * The followings are the available columns in table 'users':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $email
	 * @var string $activkey
	 * @var integer $createtime
	 * @var integer $lastvisit
	 * @var integer $superuser
	 * @var integer $status
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			#array('username, password, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 1,'message' => Yii::app()->getModule('user')->t("Incorrect username (length between 3 and 20 characters).")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => Yii::app()->getModule('user')->t("Incorrect password (minimal length 4 symbols).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => Yii::app()->getModule('user')->t("This user's name already exists.")),
			array('email', 'unique', 'message' => Yii::app()->getModule('user')->t("This user's email adress already exists.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => Yii::app()->getModule('user')->t("Incorrect symbol's. (A-z0-9)")),
			array('status', 'in', 'range'=>array(0,1,-1)),
			array('superuser', 'in', 'range'=>array(0,1)),
			array('username, password, email, createtime, lastvisit, superuser, status', 'required'),
			array('createtime, lastvisit, superuser, status', 'numerical', 'integerOnly'=>true),
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
			'profile'=>array(self::HAS_ONE, 'Profile', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'Nome de usuário',
			'password'=>Yii::app()->getModule('user')->t("password"),
			'verifyPassword'=>Yii::app()->getModule('user')->t("Retype Password"),
			'email'=>Yii::app()->getModule('user')->t("E-mail"),
			'verifyCode'=>Yii::app()->getModule('user')->t("Verification Code"),
			'id' => 'Id',
			'activkey' => Yii::app()->getModule('user')->t("activation key"),
			'createtime' => 'Data de Criação',
			'lastvisit' => 'Último acesso',
			'superuser' => 'Super Usuário',
			'status' => Yii::app()->getModule('user')->t("Status"),
		);
	}
	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACTIVE,
            ),
            'notactvie'=>array(
                'condition'=>'status='.self::STATUS_NOACTIVE,
            ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_BANED,
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
            'safe'=>array(
            	'select' => 'id, username, email, createtime, lastvisit',
            ),
        );
    }
	
	public function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				'0' => Yii::app()->getModule('user')->t('Not active'),
				'1' => Yii::app()->getModule('user')->t('Active'),
				'-1'=> Yii::app()->getModule('user')->t('Banned'),
			),
			'AdminStatus' => array(
				'0' => Yii::app()->getModule('user')->t('No'),
				'1' => Yii::app()->getModule('user')->t('Yes'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
}