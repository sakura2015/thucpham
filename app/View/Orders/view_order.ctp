<div class="panel panel-default">
  <div class="panel-heading"><h4>Thông tin khách hàng.</h4></div>
    <table class="table table-striped table-hover ">
      <tbody>
        <tr>
          <td>Tên khách hàng:</td><td><?php echo json_decode($orders['Order']['customer_info'])->name; ?></td>
        </tr>
        <tr>
          <td>Email:</td><td><?php echo json_decode($orders['Order']['customer_info'])->email; ?></td>
        </tr>
        <tr>
          <td>Số điện thoại:</td><td><?php echo json_decode($orders['Order']['customer_info'])->phone; ?></td>
        </tr>
        <tr>
          <td>Địa chỉ nhận hàng:</td><td><?php echo json_decode($orders['Order']['customer_info'])->address; ?></td>
        </tr>
        <tr>
          <td>Nội dung:</td><td><?php echo json_decode($orders['Order']['customer_info'])->content; ?></td>
        </tr>
      </tbody>
    </table> 
</div>
  <div class="panel-heading"><h4>Chi tiết đơn hàng.</h4></div>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Ảnh</th>
      <th>Sản phẩm</th>
      <th>Đơn giá</th>
      <th>Số lượng</th>
      <th>Tổng tiền</th>
    </tr>
  </thead>
  <tbody>
      <?php $order_info = json_decode($orders['Order']['order_info']);?>
      <?php foreach ($order_info as $product) { ?>
        <tr>
          <td><?php echo $this->Html->image($product->image) ?></td>
          <td><?php echo $product->title ?></td>
          <td><?php echo $this->Number->currency($product->price,'VNĐ',array('places'=>'0','wholePosition'=>'after')); ?></td>
          <td><?php echo $product->quantityTotal ?></td>
          <td><?php echo $this->Number->currency($product->price*$product->quantityTotal,'VNĐ',array('places'=>'0','wholePosition'=>'after')) ?></td>
        </tr>
      <?php } ?>
      <?php $payment_info = json_decode($orders['Order']['payment_info']);?>
      <tr>
        <td><b>Tổng số tiền khách hàng phải thanh toán là:</b></td>
        <td><b><?php echo $payment_info->total;  ?></b></td>
      </tr>
  </tbody>
</table> 