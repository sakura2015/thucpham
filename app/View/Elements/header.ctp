<div class="header_container">
	<div class="container_24">
	<div class="grid_12">
		<?php echo $this->Form->create('Product',array('action'=>'search','class'=>'search_form','inputDefaults'=>array('label'=>false))) ?>
		<?php echo $this->Form->input('keyword',array('placeholder'=>'Tìm kiếm từ khóa và enter...')) ?>
		<?php echo $this->Form->end(); ?>
	</div>
	<div class="grid_12">
		<div class="user-info">
			

		</div>
		<div class="user_menus fright">
			<ul>
				<?php $cart = $this->Session->read('cart'); ?>
				<?php $total = 0; ?>
				<?php if(isset($cart)): ?>
				<?php foreach ($cart as $carts) {
					$total += $carts['quantityTotal'];
				} ?>
				<li><span><?php echo $this->Html->link('Giỏ hàng','/gio-hang') ?> (<?php echo $total; ?>)</span></li>
				<?php if(!empty($user_info)){ ?>
					<li><i>&nbsp;&nbsp;| Chào bạn : <?php echo $user_info['username']; ?></i></li>
				<?php } ?>
			<?php else: ?>
				<li><span><?php echo $this->Html->link('Giỏ hàng','/gio-hang') ?> (0)</span></li>
				<?php if(!empty($user_info)){ ?>
					<li><i>&nbsp;&nbsp;| Chào bạn : <?php echo $user_info['username']; ?></i></li>
				<?php } ?>
			<?php endif; ?>
				<?php if(empty($user_info)){ ?>
					<li><?php echo $this->Html->link('Đăng nhập','/login') ?></li>
					<li>&nbsp;&nbsp;|</li>
					<li><?php echo $this->Html->link('Đăng ký','/register') ?></li>
					<li>&nbsp;&nbsp;</li>
				<?php } ?>
				<?php if(!empty($user_info)){ ?>
					<li><?php echo $this->Html->link('Đăng xuất','/logout') ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	</div>
</div><!--container-->