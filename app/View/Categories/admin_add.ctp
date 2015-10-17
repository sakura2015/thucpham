<?php echo $this->element('errors');?>
<?php echo $this->Form->create('Category',array('class'=>'form-horizontal','novalidate'=>true,'inputDefaults'=>array('label'=>false)));?>
<div class="form-group">
	<label for="inputName" class="col-lg-2 control-label">Tên</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('name',array('class'=>'form-control', 'placeholder'=>'Nhập tên')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="inputSlug" class="col-lg-2 control-label">Slug</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('slug',array('class'=>'form-control', 'placeholder'=>'Nhập slug')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="textArea" class="col-lg-2 control-label">Miêu tả</label>
	<div class="col-lg-10">
		<?php echo $this->Form->textarea('description',array('class'=>'form-control', 'rows'=>'3')); ?>	
		 <span class="help-block">Nhập một số miêu tả về danh mục sản phẩm.</span>
	</div>
</div>
<div class="form-group">
	<label for="inputSlug" class="col-lg-2 control-label">Type</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('type',array('class'=>'form-control', 'placeholder'=>'type')); ?>	
	</div>
</div>
<div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
  </div>
</div>
<?php echo $this->Form->end();  ?>