<?php
App::uses('AppController','Controller');

class NewsPostsController extends AppController{

	public function display(){
		$object = $this->NewsPost->find('all');
		if(isset($this->params['requested'])){
			return $object; 
		}
	}

	public function view($id = null){
		$object = array(
			'conditions' => array(
				'NewsPost.id' => $id
				)
			);
		$newsPost = $this->NewsPost->find('first',$object);
		$this->set('newsPost',$newsPost);
	}
	public function admin_index(){
		$newsPost = $this->NewsPost->find('all');
		$this->set('newsPost',$newsPost);
	}

	public function admin_edit($id = null) {
			
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NewsPost->save($this->request->data)) {
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('NewsPost.id'=> $id));
			$this->request->data = $this->NewsPost->find('first', $options);
		}
	}

	public function admin_add(){
		if($this->request->data){
			pr($this->request->data);
			$this->NewsPost->set($this->request->data);
			if($this->NewsPost->validates()){
				$this->NewsPost->save($this->request->data);
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('Vui long kiểm tra các thông nhịp nhập vào');
			}
		}
	}
}