<div class="block_item">
	<?php foreach ($products as $product) { ?>
		<?php foreach ($category as $cate) { ?>
		    <div class="breadcrumbs">
			    <ul>
			    	<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">  <a itemprop="url" href="http://www.mrsach.com.vn/"><span itemprop="title">Trang chủ</span></a></li><li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a itemprop="url" href="http://www.mrsach.com.vn/san-pham"><span itemprop="title">Sản phẩm</span></a></li><li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a itemprop="url" href="http://www.mrsach.com.vn/hoa-qua-sach-c10"><span itemprop="title"><?php echo $cate['Category']['name']; ?></span></a></li>
			 	</ul>
			</div>
		    <div class="product_detail">
			    <div id="product_img">
			        <span>
			            <a rel="example_group" href="http://www.mrsach.com.vn/images/products/sau-rieng-1b595.jpg">
			                <?php echo $this->Html->image($product['image']); ?>
			            </a>
			        </span>
			    </div>
			    <ul class="description">
			        <li><h1 class="title"><?php echo $product['title'] ?></h1></li>
			        <li>
			            <table class="properties" style="width: 100%;">
			                <tbody>
			                	<tr>
			                        <td>Mã sản phẩm <span>:</span></td>
			                        <td class="green">MS369</td>
			                    </tr>
			                    <tr>
			                        <td>Giá <span>:</span></td>
		                            <td class="red"><?php echo $this->Number->currency($product['price'],'đ',array(
		                            	'places'=>'0','wholePosition'=>'after'
		                            )) ?></td>
			                    </tr>
			                    <tr>
			                        <td>Nhóm sản phẩm <span>:</span></td>
			                        <td class="green"><?php echo $cate['Category']['name']; ?></td>
			                    </tr>
			                    <tr>
			                        <td>Lượt xem <span>:</span></td>
			                        <td class="green"><?php echo $product['view'];  ?> lượt</td>
			                    </tr>
			                </tbody>
			            </table>
		<?php } ?>
		            <div style="margin: 10px;">
		                <?php echo $this->Form->postLink('Cho vào giỏ hàng','/products/add_to_cart/'.$product['id'],array('class'=>'button btn_add2cart')) ?>
		            </div>
		        </li>
		        <li><ul class="product_images"></ul> </li>
		    </ul>
		</div>
		<div class="clear"></div>
		<div class="content">
		    <div class="product_info content_detail">
		        <strong class="green">Giới thiệu sản phẩm</strong>
				<p><?php echo $product['info'] ?></p>
		   </div>
		</div>
	<?php } ?>
	<div class="clear"></div>
	<div class="title">Sản phẩm cùng loại</div>
	<div class="related_products">
		<div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">
			<div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
				<ul id="related_products" class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 875px;">
					<?php foreach ($relative_products as $relative_product) { ?>
						<li class="product_item jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" jcarouselindex="1" style="float: left; list-style: none; width: 175px;">
						        <?php echo $this->Html->image($relative_product['Product']['image']) ?>
						        <h4><?php echo $this->Html->link($relative_product['Product']['title'],'/'.$relative_product['Product']['slug']) ?></h4>
						</li>
					<?php } ?>
				</ul>
			</div>
			<div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" disabled="disabled" style="display: block;"></div>
			<div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div>
		</div>
	</div>
</div>