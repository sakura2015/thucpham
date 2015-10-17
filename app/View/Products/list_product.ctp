<div class="block_item">
    <div class="breadcrumbs">
	    <ul>
	    	<?php foreach ($category as $cate) { ?>
	    		<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">  <a itemprop="url" href="http://www.mrsach.com.vn/"><span itemprop="title">Trang chủ</span></a></li><li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a itemprop="url" href="http://www.mrsach.com.vn/san-pham"><span itemprop="title">Sản phẩm</span></a></li><li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a itemprop="url" href="http://www.mrsach.com.vn/thuc-pham-tuoi-song-c1"><span itemprop="title"><?php echo $cate['Category']['name'] ?></span></a></li>
	    	<?php } ?>
	    </ul>
	</div>
    <h1 class="title"><?php echo $cate['Category']['name'] ?></h1>
    <div class="content">
		<ul class="products">
<?php foreach ($products as $product) { ?>
			<li class="product_item">
			<?php echo $this->Html->image($product['Product']['image']) ?>
			<?php echo $this->Html->link($product['Product']['title'],'/chi-tiet/'.$product['Product']['slug']) ?>
			<span class="price">Giá : <strong><?php echo $this->Number->currency($product['Product']['price'],'đ',array(
				'places' => 0,'wholePosition' => 'after'
			)) ?></strong>/kg</span>
			</li>       
<?php } ?>
		</ul>
        <div class="pagination">
        	<?php echo $this->element('pagination');  ?>
        </div>    
    </div>
</div>