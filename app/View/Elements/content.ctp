<div class="main_container">
    <div class="container_24">
        <div class="grid_6 col_left">
            <div class="logo">
    <a href="/">
        <img src="img/logo.png" alt="Mr. Sạch"/>
    </a>
</div>            <div class="block_item categories_menu">
    <h3 class="title">Danh mục sản phẩm</h3>
    <div class="content">
        <ul class="left_categories">
             <?php echo $this->element('categories'); ?>
        </ul>    
    </div>
</div><div class="side_item">
    <h3 class="title">Video thực phẩm hữu cơ</h3>
    <div class="content">
        <p><a href="/thucpham/video-rau-huu-co"><img src="img/news/anh_chinh_comple.jpg" alt="" width="213" height="164" /></a></p>    </div>
</div>

<div class="side_item">
    <h3 class="title">Hỗ trợ trực tuyến</h3>
    <div class="content">
        <div class="supports">
            <p>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-like-box" data-href="https://www.facebook.com/pages/L%E1%BA%ADp-tr%C3%ACnh-wordpress/872672809415491?ref_type=bookmark" data-width="220" data-height="269" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
            </p>

            <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
            <div id="SkypeButton_Call_quan2190_1">
              <script type="text/javascript">
                Skype.ui({
                  "name": "chat",
                  "element": "SkypeButton_Call_quan2190_1",
                  "participants": ["quan2190"],
                  "imageSize": 24
                });
              </script>
            <span class="sd_name">Ms. Hà</span>
            </div>
                
        </div>
    </div>
</div>

<div class="side_item">
    <h3 class="title">Tin tức thực phẩm</h3>
    <div class="content">
        <ul class="lastest_news">
            <?php $news = $this->requestAction('NewsPosts/display'); ?>
            <?php foreach ($news as $new) { ?>
                <li>
                <?php echo $this->Html->link($new['NewsPost']['title'],'/tin-tuc/'.$new['NewsPost']['id'], array('escape'=>false)); ?>
                <span><?php echo $new['NewsPost']['created'] ?></span>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>        </div>
        <div class="grid_18 col_right">
            <div class="menus">
                <ul>
                    <li class="active"><?php echo $this->Html->link('Trang chủ','/') ?></li>
                    <li><?php echo $this->Html->link('Giới thiệu','/gioi-thieu') ?></li>
                    <li><?php echo $this->Html->link('Tin tức','/tin-tuc') ?>
                        <ul class="sub_menus">
                             <?php echo $this->element('news'); ?>
                        </ul>
                    </li>
                    <li><?php echo $this->Html->link('Sản phẩm','/san-pham') ?>
                            <ul class="sub_menus">
                                <?php echo $this->element('categories'); ?>
                            </ul>
                    </li>
                    <li><?php echo $this->Html->link('Hệ thống cửa hàng','/he-thong-cua-hang') ?></li>
                    <li><?php echo $this->Html->link('Liên hệ','/lien-he') ?></li>
                </ul>            
            </div>
<div class="slideshow">
    <ul>
        <li class="slide">
            <a href="#">
                <img src="img/advs/19af4.jpg" border="0" alt="" title="" />
            </a>
        </li>
                <li class="slide">
            <a href="#">
                <img src="img/advs/19b06.jpg" border="0" alt="" title="" />
            </a>
        </li>
                <li class="slide">
            <a href="#">
                <img src="img/advs/19af9.jpg" border="0" alt="" title="" />
            </a>
        </li>
                <li class="slide">
            <a href="#">
                <img src="img/advs/19b00.jpg" border="0" alt="" title="" />
            </a>
        </li>
                <li class="slide">
            <a href="#">
                <img src="img/advs/1bb30.jpg" border="0" alt="" title="" />
            </a>
        </li>
                <li class="slide">
            <a href="#">
                <img src="img/advs/28010.jpg" border="0" alt="" title="" />
            </a>
        </li>
    </ul>
</div>
<?php echo $this->fetch('content'); ?>            