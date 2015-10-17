<?php echo $this->Form->create('NewsPost',array('class'=>'form-horizontal','novalidate'=>true,'inputDefaults'=>array('label'=>false))); ?>
<div class="form-group">
	<label for="inputTitle" class="col-lg-2 control-label">Tiêu đề</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('title',array('class'=>'form-control', 'placeholder'=>'Nhập tiêu đề')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="inputDescription" class="col-lg-2 control-label">Tiêu miêu tả</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('info',array('class'=>'form-control ckeditor', 'placeholder'=>'Nhập miêu tả')); ?>	
	</div>
</div>

<div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <button type="submit" class="btn btn-primary">Cập nhật</button>
  </div>
</div>
<?php echo $this->form->end(); ?>