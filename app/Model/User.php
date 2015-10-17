<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 * @property Comment $Comment
 * @property Order $Order
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Tên đăng nhập không được để trống',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule'=> 'isUnique',
				'message'=>'Tên đăng nhập đã được đăng ký, vui lòng đổi tên đăng nhập khác'
			),	
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Mật khẩu không được để trống',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule'=> array('minlength',5),
				'message'=>'Mật khẩu phải có độ dài tối thiểu là 5 ký tự'
				),
		),
		'confirm_password'=> array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Xác nhận mật khẩu không được để trống',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'match_password' => array(
				'rule' => array('match_password','password'),
				'message'=>'Xác nhận mật khẩu không đúng'
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email không được để trống',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule'=> 'isUnique',
				'message'=>'Email đã được đăng ký, vui lòng đổi email khác'
				),
		),
		'firstname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Vui lòng điền vào tên của bạn',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lastname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Vui lòng điền vào họ của bạn',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'confirm' => array(
			'boolean' => array(
				'rule'    => array('boolean'),
				'message' => 'Vui lòng check vào ô đồng ý điều khoản của chickenrainshop để đăng ký.'
				),
			'checked' => array(
				'rule' => array('equalTo','1'),
				'message' => 'Bạn không đồng ý với điều khoản của chickenrainshop?'
				)
		),
	);



	public function match_password($check, $password_field = 'password'){
		$password = $this->data['User'][$password_field];
		$confirm_password = $this->data['User']['confirm_password'];
		if (strcmp($password, $confirm_password)==0) {
			return true;
		}else{
			return false;
		}
	}

	public function beforeSave($options = array()){
		if (isset($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
	}


}
