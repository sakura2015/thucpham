<?php
App::uses('AppController','Controller');

class UsersController extends AppController{ 

	public function register(){
		if($this->request->is('post')){
			//pr($this->request->data);//exit;
			$this->User->set($this->request->data);
			if($this->User->validates()){
				$data = array(
					'group_id'=> 2,
					'lastname' => $this->request->data['User']['lastname'],
					'firstname' => $this->request->data['User']['firstname'],
					'username' => $this->request->data['User']['username'],
					'password' => $this->request->data['User']['password'],
					'email' => $this->request->data['User']['email'],
					'address' => $this->request->data['User']['address'],
					'phone_number' => $this->request->data['User']['phone_number']
					);
				if($this->User->saveAll($data)){
					$this->Auth->login();
					$this->redirect('/');
				}else{
					$this->Session->setFlash('Đăng ký bị lỗi!', 'default', array('class'=>'alert alert-danger'));
				}
			}else{
				$this->set('errors', $this->User->validationErrors);
			}
		}
		$this->set('title_for_layout', 'Đăng ký - ChickenRainShop');
	}


	public function login(){
		$user_info = $this->get_user();
		if($this->request->is('post')){
			if($this->Auth->login()){
				if($user_info['group_id'] == 2){
			    	$this->redirect(array('controller'=>'products','action'=>'view_cart'));
				} elseif($user_info['group_id'] == 1) {
			    	$this->redirect(array('controller'=>'products','action'=>'admin_index'));
				}
			
			}else{
				$this->Session->setFlash('Sai tên đăng nhập hoặc mật khẩu!','default',array('class'=>'alert alert-danger'),'auth');
			}

		}

	}

	public function logout(){
		$this->redirect($this->Auth->logout());
	}
}