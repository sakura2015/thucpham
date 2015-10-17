<div class="block_item">
    <div class="breadcrumbs">
        <ul>
            <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">  <a itemprop="url" href="http://www.mrsach.com.vn/"><span itemprop="title">Trang chủ</span></a></li><li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a itemprop="url" href="http://www.mrsach.com.vn/gio-hang"><span itemprop="title">Giỏ hàng</span></a></li>
        </ul>
    </div>
                    <?php $cart = $this->Session->read('cart'); ?>
                    <?php if(empty($cart)):?>
                        <span>Giỏ hàng của bạn đang trống,vui lòng click vể <?php echo $this->html->link('trang chủ','/') ?> để thực hiện mua hàng.</span>
                    <?php else: ?>
                    <div class="content form">
                        <table id="cart_summary" style="width: 100%;" class="table t_gray">
                                <thead>
                                    <tr>
                                        <td style="width: 5%">Ảnh</td>
                                        <td>Sản phẩm</td>
                                        <td>Đơn giá</td>
                                        <td>Số lượng</td>
                                        <td>Thao tác</td>
                                        <td>Thành tiền</td>
                                    </tr>
                                </thead>
                                <tbody>
                        <?php foreach ($cart as $carts) { ?>
                            <tr>
                                <td style="vertical-align: center;">
                                    <?php echo $this->Html->image($carts['image']); ?>
                                </td>
                                <td>
                                    <?php echo $carts['title'] ?>
                                </td>
                                <td>
                                    <span class="price"><?php echo $this->Number->currency($carts['price'],'đ',array(
                                        'places' => '0','wholePosition'=>'after'
                                    )); ?></span>
                                </td>
                                <td>
                                    <?php echo $this->Form->create('Product',array('class'=>'form-inline','url'=>'/products/update/'.$carts['id'])); ?>
                                      <?php echo $this->Form->input('quantityTotal',array('maxlength'=>'2', 'size'=>'2','value'=>$carts['quantityTotal'],'class'=>'col col-lg-2','label'=>false,'div'=>false)) ?>
                                      <?php echo $this->Form->button('Cập nhật',array('type'=>'submit','class'=>'btn btn-link')) ?>
                                      <?php echo $this->Form->end(); ?>
                                </td>
                                <td><?php echo $this->Form->postLink('<i class="fa fa-times"></i>','/products/remove/'.$carts['id'],array('escape'=>false)) ?></td>
                                <td>
                                    <span class="price"><?php echo $this->Number->currency($carts['price']*$carts['quantityTotal'],'đ',array(
                                            'places'=>'0','wholePosition'=>'after'
                                        )) ?></span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">Tổng cộng tiền phải trả:</td>
                            <?php $total = $this->Session->read('payment.total'); ?>
                            <td class="total_price"><?php echo $this->Number->currency($total,'đ',array(
                                            'places'=>'0','wholePosition'=>'after'
                                        )) ?></td>
                        </tr>
                        <tr>
                        </tr>
                    </tfoot>
            </table>
                <div class="bottom_button" style="width: 100%; float: left;">
                   <?php echo $this->Html->link('Tiếp tục mua hàng','/',array('class'=>'button green_hover')) ?>
                   <?php echo $this->Form->postLink('Làm trống giỏ hàng','/products/empty_cart',array('class'=>'button green_hover')) ?>
                </div>
                            <br class="clear-both">
                        <br class="clear-both">
                        <br class="clear-both">
                    </div>
                    <?php echo $this->Session->flash('order'); ?>
                        <div class="content form" style="margin-top: 15px; float:left;">
                            <?php if($user_info): ?>
                            <h3 class="title" style="margin-bottom: 10px;">Thông tin người mua hàng và nhận hàng</h3>
                            <?php echo $this->Form->create('Order',array('action'=>'checkout','novalidate'=>true,'inputDefaults'=>array('label'=>false))); ?>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Họ và tên : </td>
                                            <td><?php echo $this->Form->input('name',array('placeholder'=>'Nhập họ tên')); ?><span>*</span></td>
                                        </tr>
                                        <tr>
                                            <td>Điện thoại : </td>
                                            <td><?php echo $this->Form->input('phone',array('placeholder'=>'Nhập số điện thoại')); ?></td>
                                            <!-- <td><input type="text" name="phone" value="" style="width: 300px;" maxlength="50"> <span>*</span></td> -->
                                        </tr>
                                        <tr>
                                            <td>Email : </td>
                                            <td> <?php echo $this->Form->input('email',array('placeholder'=>'Nhập email')); ?><span>*</span></td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ : </td>
                                            <td><?php echo $this->Form->input('address',array('placeholder'=>'Nhập địa chỉ')); ?><span>*</span></td>
                                        </tr>
                                        <tr>
                                            <td>Thông tin khác : </td>
                                            <td><?php echo $this->Form->textarea('content',array('cols'=>'90' , 'rows'=>'12')) ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <?php echo $this->Form->button('Đặt hàng',array('type'=>'submit','class'=>'input_button')) ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form><?php echo $this->Form->end(); ?>    
                            <?php else: ?>
                            <p>Bạn phải <?php echo $this->Html->link('đăng nhập','/login') ?> trước khi thanh toán đơn hàng.</p>
                            <?php endif; ?>
                    </div>
                    <?php endif;  ?>

</div>