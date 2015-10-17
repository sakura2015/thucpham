<?php
App::uses('AppController','Controller');

class CategoriesController extends AppController{

	var $uses = array('Product','Category','Comment','NewsPost');
	public function display(){
		$category = $this->Category->find('all',array(
				'conditions' => array(
						'type' => 1
					)
			));
		if(isset($this->params['requested'])){
			return $category; 
		}
	}

	public function view($slug = null) {
		$category = $this->Category->find('all',array(
			'conditions' => array(
				'Category.slug' => $slug
				)
			));

		$this->set('category',$category);
		if($category) {
			$this->paginate = array(
				'conditions' => array(
					'Product.category_id' => $category['0']['Category']['id']
					),
				'limit' => 4
				);
			$products = $this->paginate();
			$this->set('products',$products);
		}
	}	
	public function newsPost(){
		$category1 = $this->Category->find('all',array(
				'conditions' => array(
						'type' => 2
					)
			));
		if(isset($this->params['requested'])){
			return $category1; 
		}
	}
	public function admin_add(){
		if($this->request->data){
			$this->Category->set($this->request->data);
			if($this->Category->validates()){
				$this->Category->save($this->request->data);
				$this->redirect($this->referer());
			}else {
				$this->set('errors', $this->Category->validationErrors);
			}
		}
	}


	public function xem(){
		$danhmuc=$this->Category->find("all",array("limit"=>12));
		//pr($danhmuc);
	}

}