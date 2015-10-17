<div class="panel panel-info">
	 <h4 class="panel-heading"><i class="glyphicon glyphicon-user"></i> Đăng ký</h4>
	 <?php if (empty($user_info)): ?>
		 <?php echo $this->element('errors'); ?>
			<?php echo $this->Form->create('User', array('class'=>'form-horizontal','inputDefaults'=> array('label'=>false, 'error'=> false))); ?>
			 	<fieldset>
					<div class="form-group">
					    <label class="control-label col-lg-2" for="inputEmail">Last Name</label>
					    <div class="col-lg-10">
					      <?php echo $this->Form->input('lastname', array('class'=>'form-control','placeholder'=> 'Họ')); ?>
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-2" for="inputEmail">First Name</label>
					    <div class="col-lg-10">
					      <?php echo $this->Form->input('firstname', array('class'=>'form-control','placeholder'=> 'Tên')); ?>
					    </div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2" for="inputEmail">Username</label>
						<div class="col-lg-10">
						  <?php echo $this->Form->input('username', array('class'=>'form-control','placeholder'=> 'Tên đăng nhập')); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2" for="inputEmail">Email</label>
						<div class="col-lg-10">
						  <?php echo $this->Form->input('email', array('class'=>'form-control','placeholder'=> 'Địa chỉ email')); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2" for="inputPassword">Password</label>
						<div class="col-lg-10">
						  <?php echo $this->Form->input('password', array('class'=>'form-control','placeholder'=> 'Mật khẩu')); ?>
						</div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-2" for="inputEmail">Confirm Password</label>
					    <div class="col-lg-10">
					      <?php echo $this->Form->input('confirm_password', array('class'=>'form-control','placeholder'=> 'Xác nhận mật khẩu', 'type'=>'password')); ?>
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-2" for="inputEmail">Address</label>
					    <div class="col-lg-10">
					      <?php echo $this->Form->input('address', array('class'=>'form-control','placeholder'=> 'Địa chỉ')); ?>
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-2" for="inputEmail">Phone</label>
					    <div class="col-lg-10">
					      <?php echo $this->Form->input('phone_number', array('class'=>'form-control','placeholder'=> 'Số điện thoại')); ?>
					    </div>
					</div>
					<div class="form-group">
						<?php $policy = '<strong>Tôi đồng ý với các '.$this->Html->link('điều khoản','/dieu-khoan').' mà ChickenRain Shop đã đưa ra.</strong>'; ?>
						<div class="checkbox">
							
						  <label>
						        <?php echo $this->Form->input('confirm', array('type'=>'checkbox','label'=> $policy, 'escape'=>true)); ?>
						  </label>
						</div>
					</div>
					<hr>
					<div class="form-actions">
					  <?php echo $this->Form->button('Đăng ký', array('type'=>"submit", 'class'=>"col-lg-2 btn btn-primary")); ?>
					</div>
				</fieldset>
			<?php echo $this->Form->end(); ?>
		<?php else: ?>
			Bạn đã đăng nhập, click vào <?php echo $this->Html->link('đây','/'); ?> để quay về trang chủ.
		<?php endif ?>
</div>