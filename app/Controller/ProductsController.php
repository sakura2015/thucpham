<?php
App::uses('AppController','Controller');
App::uses('File','Utility');

class ProductsController extends AppController{

	var $uses = array('Product','Category','Comment','NewsPost');

	//Action home dùng để hiện thị các thông tin nên phần content(body) của sản phẩm
	public function home(){
		$object = array(
			'conditions'=>array(
				'status' => 1 //Hiển thị những sản phẩm có trạng thái satus =1
				),
			'order' => array('id'=>'desc'), //Sắp xếp sản phẩm theo chiều giảm dần của id. ví dụ 4 ,3 ,2 ,1
			'limit' => 12 //Chỉ hiển thì 12 sản phẩm trong mục sản phẩm mới
			);
		$latest_products = $this->Product->find('all',$object); //Select(lựa chọn) sản phẩm trong bảng product với điều kiện #object

		//Gán biến $latest_products bằng với chuỗi latest_products để xét biến đó xuống view
		//View là action tên là home nằm trong thư mục view/Products/home.ctp
		$this->set('latest_products',$latest_products);

		//Hiển thị sản phẩm bán chạy

		$product_sellers = $this->Product->find('all',array(
			'conditions'=>array('status' =>1),
			'order' => array('Product.hot'=>'desc'),
			'limit' => 12
			));
		$this->set('product_sellers',$product_sellers);

	}

	public function introduction(){
		
	}

	public function system(){

	}

	public function contact(){

	}

	public function video(){
		
	}

	public function view($slug = null){
		//Truy vấn xem trong bảng Product có trường slug bằng với trường slug hiển thị trên đường link không
		$object = array(
			'conditions' => array(
				'Product.slug' => $slug
				)
			);

		//Hiển thị sản phẩm người dùng vừa nhấn vào xem
		$products = $this->Product->find('first',$object);

		//Thống kế số người xem sản phẩm
			$this->Product->id = $products['Product']['id'];
			$this->Product->saveField('view',$products['Product']['view'] + 1);
			$this->set('products',$products);

		//Hiển thị danh mục của sản phẩm
		$category = $this->Category->find('all',array(
			'conditions' => array(
				'Category.id' => $products['Product']['category_id']
				)
			));
		$this->set('category',$category);

		//Hiển thị những sản phẩm liên quan
		$relative_products = $this->Product->find('all',array(
			'conditions' => array(
				'Product.category_id' => $products['Product']['category_id']
				)
			));
		$this->set('relative_products',$relative_products);

	}


	public function list_product($slug = null) {
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

	public function search(){
		$this->paginate = array(
			'conditions' => array(
				'title like' => '%'.$this->request->data['Product']['keyword'].'%' 
				),
			'limit' => 8
			);
		$products = $this->paginate();
		$this->set('products',$products);
	}

	public function add_to_cart($id = null){
		if($this->request->is('post')){
			$object = $this->Product->find('first',array(
				'conditions' => array(
					'Product.id' => $id
					)
				));
			if($this->Session->check('cart.'.$id)){
				$item = $this->Session->read('cart.'.$id);
				$item['quantityTotal'] +=1;
			} else {
				$item = array(
					'id' => $object['Product']['id'],
					'title' => $object['Product']['title'],
					'slug' => $object['Product']['slug'],
					'image' => $object['Product']['image'],
					'price' => $object['Product']['price'],
					'quantityTotal' => 1
				);
			}
			$this->Session->write('cart.'.$id,$item);

			// Tính tổng giá trị của giỏ hàng.
			$cart = $this->Session->read('cart');
			$total = 0;
			foreach ($cart as $product) {
				$total += $product['quantityTotal']*$product['price'];
			}
			$this->Session->write('payment.total',$total);

			$this->redirect(array('controller'=>'products','action'=>'view_cart'));
		}
	}


	public function view_cart(){

	}
	public function empty_cart(){
		if($this->request->is('post')){
			$this->Session->delete('cart');
			$this->Session->delete('payment');
			$this->redirect($this->referer());
		}
	}

	public function remove($id = null) {
		$this->Session->delete('cart.'.$id);
		$carts = $this->Session->read('cart');
		if(empty($carts)){
			$this->empty_cart();
		}else {
			$total = 0;
			foreach ($carts as $products) {
				$total += $products['quantityTotal']*$products['price'];
			}
			$this->Session->write('payment.total',$total);
		}
		$this->redirect($this->referer());
	}

	public function update_payment(){
		$carts = $this->Session->read('cart');
		$total = 0;
		foreach ($carts as $cart) {
			$total += $cart['price']*$cart['quantityTotal'];
		}
		$this->Session->write('payment.total',$total);
	}

	public function update($id = null){
		if($this->request->is('post')){
			$quantityTotal = $this->request->data['Product']['quantityTotal'];
			$products = $this->Session->read('cart.'.$id);
			if(!empty($products)&&$quantityTotal>0){
				$products['quantityTotal'] = round($quantityTotal);
				$this->Session->write('cart.'.$id,$products);
			}
			
			$this->update_payment();
			$this->redirect($this->referer());
		}
	}


	public function vidu(){
		$product = $this->Product->find('first');
		pr($product);
	}



	// ----------------------Phần quản trị của admin---------------------------------------

	public function admin_add(){
		if($this->request->data){
				$category = $this->Category->findById($this->request->data['Product']['category_id']);
				$result = $this->uploadFile($category['Category']['folder']);

			if($result['status']){
				$location = '/img/'.$category['Category']['folder'].'/'.$result['file_name'];
				$this->request->data['Product']['image'] = $location;
				$this->Product->create();
				if ($this->Product->save($this->request->data)) {
					$this->Session->setFlash(__('Đã lưu thành công.'));
					$this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('Không lưu được, vui lòng thử lại sau!'));
				}
			}else{
				$this->Session->setFlash(__('Bạn chưa upload hình ảnh minh họa cho sách đã tạo!'));
			}
		}

			$categories = $this->Category->find('list');
			$this->set('categories',$categories);
	}


	public function admin_index(){
		$this->layout = 'admin';
		$products = $this->Product->find('all');
		$this->set('products',$products);

		$count = $this->Product->find('count');
		$this->set('count',$count);
	}

	public function admin_edit($id = null){
			$object = $this->Product->find('first',array(
				'conditions'=>array('Product.id'=>$id)
				));
			// pr($object);die;
		if ($this->request->is('post') || $this->request->is('put')) {
			// pr($this->request->data);die;
				$category = $this->Category->findById($this->request->data['Product']['category_id']);
				$result = $this->uploadFile($category['Category']['folder']);

			if($result['status']){
				$location = '/img/'.$category['Category']['folder'].'/'.$result['file_name'];
				$this->request->data['Product']['image'] = $location;
				$this->request->data['Product']['id'] = $id;
				$this->Product->create();
				if ($this->Product->save($this->request->data)) {
					$this->Session->setFlash(__('Đã lưu thành công.'));
					$this->redirect(array('action'=>'admin_index'));
				} else {
					$this->Session->setFlash(__('Không lưu được, vui lòng thử lại sau!'));
				}
			}else{
				$this->request->data['Product']['image'] = $object['Product']['image'];
				$this->request->data['Product']['id'] = $id;
				$this->Product->create();
				if ($this->Product->save($this->request->data)) {
					$this->Session->setFlash(__('Đã lưu thành công.'));
					$this->redirect(array('action'=>'admin_index'));
				} else {
					$this->Session->setFlash(__('Không lưu được, vui lòng thử lại sau!'));
				}
			}
		}else {
			$options = array('conditions' => array('Product.id'=> $id));
			$this->request->data = $this->Product->find('first', $options);
		}

			$categories = $this->Category->find('list');
			$this->set('categories',$categories);
	}

	private function uploadFile($folder = null){
		$file = new File($this->request->data['Product']['image']['tmp_name']);
		$file_name = $this->request->data['Product']['image']['name'];
		if($file->copy(APP.'webroot/img/'.$folder.'/'.$file_name)){
			$result = array(
				'status' => true,
				'file_name' => $file_name
				);
		}else{
			$result = array(
				'status' => false,
				'file_name' => $file_name
				);
		}
		return $result;

	}
}
