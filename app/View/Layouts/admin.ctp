<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		// echo $this->Html->css('cake.generic');
		echo $this->Html->css('admin');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->script('ckeditor/ckeditor');
	?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
<body>
	<div id="container">
		<div class="row" id="admin-header">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " id="admin-top">
				<div class="admin-title"><span class="glyphicon glyphicon-home"></span>TRANG QUẢN TRỊ</div>
				<div class="info"><?php if($user_info){
					echo "Hi, ".$user_info['username'];
				} ?>

				<div class="btn-group">
					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span></button>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
					<ul class="dropdown-menu">
					<li><a href="#">Logout</a></li>
					<li><a href="#">Edit my profile</a></li>
					</ul>
				</div>
			</div>
			</div> 
		</div>
		<div class="clear"></div>
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="admin-left">
				<div class="panel-group" id="accordion">
				  <div class="panel panel-default">
				    <div class="panel-heading">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				          <span class="glyphicon glyphicon-th"></span>Sản phẩm
				        </a>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse">
				      <div class="panel-body">
				           <ul>
						      <li><?php echo $this->Html->link('Thêm sản phẩm','/quan-tri/them-san-pham') ?></li>
						    </ul>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				          <span class="glyphicon glyphicon-tasks"></span>Đơn hàng
				        </a>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse">
				      <div class="panel-body">
				       		<ul>
						      <li><?php echo $this->Html->link('Xem đơn hàng','/don-hang') ?></li>
						    </ul>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
				          <span class="glyphicon glyphicon-comment"></span></i>Bình luận
				        </a>
				    </div>
				    <div id="collapseThree" class="panel-collapse collapse">
				      <div class="panel-body">
				        	<ul>
						      <li><a href="#">Xem bình luận</a></li>
						    </ul>
				      </div>
				    </div>
				  </div>				  
				  <div class="panel panel-default">
				    <div class="panel-heading">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
				          <span class="glyphicon glyphicon-list-alt"></span></i>Tin tức
				        </a>
				    </div>
				    <div id="collapseThree" class="panel-collapse collapse">
				      <div class="panel-body">
				        	<ul>
						      <li><a href="#">Xem tin tức</a></li>
						    </ul>
				      </div>
				    </div>
				  </div>
			  	<div class="panel panel-default">
				    <div class="panel-heading">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
				          <span class="glyphicon glyphicon-user"></span> Người dùng
				        </a>
				    </div>
				    <div id="collapseFour" class="panel-collapse collapse">
				      <div class="panel-body">
				        	<ul>
						      <li><a href="#">Xem thông tin người dùng</a></li>
						      <li><a href="#">Thêm một người dùng</a></li>
						    </ul>
				      </div>
				    </div>
				  </div>
				</div>

			</div> 
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<?php echo $this->fetch('content'); ?>
			</div> 
		</div>
	</div><!--container-->
	<?php echo $this->element('sql_dump'); ?>
</body>
		<?php 
		echo $this->Html->script('jquery-1.9.1.min');
		echo $this->Html->script('bootstrap.min');
		 ?>
</html>
