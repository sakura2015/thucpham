<?php
App::uses('AppController','Controller');

class OrdersController extends AppController{ 
	var $uses = array('Order','Product');
	public function checkout(){
		if($this->request->is('post')){
			$user_info = $this->get_user();
			$data = array(
				'user_id' => $user_info['id'],
				'customer_info' => json_encode($this->request->data['Order']),
				'order_info' => json_encode($this->Session->read('cart')),
				'payment_info' => json_encode($this->Session->read('payment')),
				'status' => 0
				);
			if($this->Order->saveAll($data)) {

				$cart = $this->Session->read('cart');
				foreach ($cart as $statistic) {
					$product = $this->Product->find('first',array(
						'conditions' => array(
							'Product.id' => $statistic['id']
							)
						));
					if($product){
						$this->Product->id = $statistic['id'];
						$this->Product->saveField('hot',$product['Product']['hot'] + 1);
					}
				}

				$this->Session->delete('cart');
				$this->Session->delete('payment');
			}else {
				$this->Session->setFlash('Thanh toán không thành công','default','order');
			}
			$this->redirect($this->referer());
		}
	}

	public function admin_index(){
		if($this->request->data){
			$this->Order->id=$this->request->data['Order']['id'];
			$this->Order->saveField("status",1);
		}
		$order = $this->Order->find('all');
		$this->set('orders',$order);
	}

	public function admin_delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Order deleted'));
			$this->redirect(array('action' => 'admin_index'));
		}
		$this->Session->setFlash(__('Order was not deleted'));
		$this->redirect(array('action' => 'admin_index'));
	}

	public function view_order($id = null){
		$this->layout = 'admin';
		$object = $this->Order->find('first',array(
			'conditions' => array(
				'Order.id' => $id
				)
			));
		$this->set('orders',$object);
	}
}