<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar',
		'Session',
		'Auth' => array(
			'loginAction' => '/login',
			'authError' => 'Bạn cần phải đăng nhập để tiếp tục.',
			'flash' => array(
				'element' => 'default',
				'key' => 'auth',
				'params' => array('class'=>'alert alert-danger')
				),
			'loginRedirect' => '/'
			)
		);

	public function beforeFilter(){
		$this->Auth->allow('view','home','display','xem','login','video','introduction','system','contact','logout','register','login','add_to_cart','view_cart','empty_cart','update','checkout','remove','newsPost','list_product','search','update_payment');
		$this->set('user_info',$this->get_user());

		if(substr($this->request->params['action'], 0,6)=='admin_'){
			$this->layout = 'admin';
		}
	}

	public function get_user(){
		if($this->Auth->login()){
			return $this->Auth->user();
		}
	}

}
