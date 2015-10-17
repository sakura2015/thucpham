<div class="block_item">
    <h3 class="title">Giới thiệu Mr Sạch</h3>
    <div class="content">
        <div class="introduction justify">
            <p><a class="intro_img"><img style="float: left; margin: 0 15px;" src="img/news/JPEG_Image_204_O_204_pixels.jpg" alt="" width="128" height="128" /></a> Rau sạch nói riêng và thực phẩm hữu cơ nói chung là một sản phẩm cần thiết, hữu ích cho cuộc sống nhằm bảo vệ sức khỏe cho mỗi cá nhân, gia đình. Sản phẩm rau sạch được công ty triển khai theo quy trình khép kín từ khâu làm đất, gieo trồng đến chế biến và phân phối trực tiếp đến tận tay người tiêu dùng, nhằm đảm bảo sự an toàn cho sản phẩm và cắt giảm chi phí sản xuất. Mong muốn và tâm huyết thì nhiều, nhưng trong công tác triển khai ban đầu, công ty cũng gặp những bỡ ngỡ, khó khăn vì tuân thủ các quy trình chặt chẽ và thực hành nhiều công đoạn từ sản xuất đến phân phối.</p>            <a class="read_more fright" href="/gioi-thieu.htm">Chi tiết</a>
        </div>
    </div>
</div>            
<div class="block_item">
    <h3 class="title">Thực phẩm mới</h3>
    <div class="content">
        <ul class="featured_products">
            <!-- Hiển thị 12 sản phẩm mới nhất trong mục Thưc phẩm mới -->
            <!-- hàm foreach dùng để duyệt các sản phẩm nằm trong biến $latest_products và hiển thị chúng ra ngoài view-->
            <?php  foreach ($latest_products as $product) { ?> 
                <li class="product_item">
                    <img class="ribbons" src="img/new.png"/>
                    <?php echo $this->Html->image($product['Product']['image'],array('class'=>'img')); ?>
                    <?php echo $this->Html->link($product['Product']['title'],'/'.$product['Product']['slug'],array('class'=>'title staistic')); ?>
                    <span class="price">Giá : <strong><?php echo $this->Number->currency($product['Product']['price'],'VNĐ',array('places'=>'0','wholePosition'=>'after')) ?></strong>/kg</span>
                </li>
            <?php } ?>
            <!-- Kết thúc phần hiển thị 12 sản phẩm mới nhất trong mục Thưc phẩm mới -->
        </ul>
    </div>
</div>
<div class="block_item">
        <h3 class="title">Thực phẩm bán chạy</h3>
        <div class="content">
            <ul class="featured_products">
                <?php foreach ($product_sellers as $product) { ?>
                <li class="product_item">
                    <img class="ribbons" src="img/new.png"/>
                    <?php echo $this->Html->image($product['Product']['image'],array('class'=>'img')); ?>
                    <?php echo $this->Html->link($product['Product']['title'],'/'.$product['Product']['slug'],array('class'=>'title')); ?>
                    <span class="price">Giá : <strong><?php echo $this->Number->currency($product['Product']['price'],'VNĐ',array('places'=>'0','wholePosition'=>'after')) ?></strong>/kg</span>
                </li>
                <?php } ?>
            </ul>
        </div>
</div>        
</div>
    </div>
</div>