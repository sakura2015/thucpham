  <div class="panel-heading"><h4>THÊM SẢN PHẨM</h4></div>
<?php echo $this->Form->create('Product',array('type'=>'file','class'=>'form-horizontal','novalidate'=>true,'inputDefaults'=>array('label'=>false))); ?>
<div class="form-group">
      <label for="select" class="col-lg-2 control-label">Danh mục</label>
      <div class="col-lg-10">
      <!--   <select class="form-control" id="select">
        </select> -->
        <?php echo $this->Form->select('category_id',$categories) ?>
      </div>
</div>
<div class="form-group">
	<label for="inputTitle" class="col-lg-2 control-label">Tiêu đề</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('title',array('class'=>'form-control', 'placeholder'=>'Nhập tiêu đề')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="inputSlug" class="col-lg-2 control-label">Slug</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('slug',array('class'=>'form-control', 'placeholder'=>'Nhập slug')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="inputImage" class="col-lg-2 control-label">Image</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('image',array('type' =>'file','class'=>'form-control', 'placeholder'=>'Nhập ảnh')); ?>
	</div>
</div>
<div class="form-group">
	<label for="inputDescription" class="col-lg-2 control-label">Tiêu miêu tả</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('info',array('class'=>'form-control ckeditor', 'placeholder'=>'Nhập miêu tả')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="inputPrice" class="col-lg-2 control-label">Giá gốc</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('price',array('class'=>'form-control', 'placeholder'=>'Nhập giá gốc')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="inputSale_price" class="col-lg-2 control-label">Giảm giá</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('sale',array('class'=>'form-control', 'placeholder'=>'Nhập phần trăm giảm giá')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="inputQuantity" class="col-lg-2 control-label">Số lượng</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('quantity',array('class'=>'form-control', 'placeholder'=>'Nhập số lượng sản phẩm')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="inputHot" class="col-lg-2 control-label">Sản phẩm bán chạy</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('hot',array('class'=>'form-control', 'placeholder'=>'Đánh dấu sách bán chạy')); ?>	
	</div>
</div>
<div class="form-group">
	<label for="inputStatus" class="col-lg-2 control-label">Status</label>
	<div class="col-lg-10">
		<?php echo $this->Form->input('status',array('class'=>'form-control', 'placeholder'=>'Nhập số lượng sản phẩm')); ?>	
	</div>
</div>
<div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
  </div>
</div>
<?php echo $this->form->end(); ?>
