  <div class="panel-heading"><h4>THÔNG TIN ĐƠN HÀNG</h4></div>
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>STT</th>
	      <th>Tên khách hàng</th>
	      <th>Số điện thoại</th>
	      <th>Tổng tiền phải trả</th>
	      <th>Trạng thái</th>
	      <th>Thao tác</th>
	    </tr>
	  </thead>
	  <tbody>
	<?php $i = 0; ?>
	<?php foreach ($orders as $order) { ?>

	    <tr>
	      <td><?php echo $i++; ?></td>
	      <td><?php echo json_decode($order['Order']['customer_info'])->name; ?></td>
	      <td><?php echo json_decode($order['Order']['customer_info'])->phone; ?></td>
	      <td><?php echo $this->Number->currency(json_decode($order['Order']['payment_info'])->total,'VNĐ',array(
	      	'places'=>'0','wholePosition'=>'after'
	      )); ?></td>
	      <td>
	      	<?php if($order['Order']['status'] == 0): ?>
	      	<button type="button" class="btn btn-primary">Đang xử lý</button>
	      	<?php else: ?>
	      	<button type="button" class="btn btn-success">Đã xử lý</button>
	      <?php endif; ?>
	      </td>
	      <td>
	      	<button type="button" class="btn btn-info"><?php echo $this->Html->link('Xem','/chit-tiet-don-hang/'.$order['Order']['id']) ?></button>

			<?php if($order['Order']['status'] == 0): ?>
	      	<?php 
				echo $this->Form->create('Order');
				echo $this->Form->input('id',array('type'=>'hidden','value'=>$order['Order']['id'])); 
				echo $this->Form->input('status',array('type'=>'hidden','value'=>$order['Order']['status'])); 
				echo $this->Form->button('Xác nhận', array('type'=>'submit', 'class'=>'btn btn-danger'));
				echo $this->Form->end(); 
			?>
            <button type="button" class="btn btn-default">	      	
            	<?php
	                echo $this->Form->postLink(
	                    'Hủy',
	                    array('action' => 'admin_delete', $order['Order']['id']),
	                    array('confirm' => 'Bạn có chắc chắn muốn hủy đơn hàng này không?')
	                );
            	?>
        	</button>
			<?php endif; ?>



	      </td>
	    </tr>
	<?php } ?>
	  </tbody>
	</table>