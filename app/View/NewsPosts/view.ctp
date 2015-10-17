<div class="block_item">
    <div class="breadcrumbs">
	    <ul>
	   		 <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">  <a itemprop="url" href="http://www.mrsach.com.vn/"><span itemprop="title">Trang chủ</span></a></li><li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a itemprop="url" href="http://www.mrsach.com.vn/tin-tuc-n1"><span itemprop="title">Tin tức</span></a></li>
	    </ul>
	</div>
	<div class="content">
		<?php foreach ($newsPost as $news) { ?>
	        <h1 class="title"><?php echo $news['title']; ?></h1>
	        <div class="news_detail">
	            <div class="content_detail">
	                <div class="news_date">
	                    Tin đăng ngày : <strong><?php echo $news['created']; ?></strong> 
	                </div>
	                <div class="content_detail">
	                    <p><?php echo $news['info']; ?></p>                
	                </div>
	            </div>
	        </div>
		<?php } ?>
    </div>
</div>