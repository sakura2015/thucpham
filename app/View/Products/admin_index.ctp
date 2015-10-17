  <div class="panel-heading"><h4>THÔNG TIN SẢN PHẨM</h4></div>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Hình ảnh</th>
      <th>Giá</th>
      <th>Số lương</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php $a = 0; ?>
    <?php foreach ($products as $product) { ?>
      <tr>
        <td><?php echo $a++; ?></td>
        <td><?php echo $product['Product']['title'] ?></td>
        <td><?php echo $this->Html->image($product['Product']['image']) ?></td>
        <td><?php echo $product['Product']['price'] ?></td>
        <td><?php echo $product['Product']['quantity'] ?></td>
        <td><?php echo $this->Html->link('Edit','/sua-san-pham/'.$product['Product']['id']) ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table> 