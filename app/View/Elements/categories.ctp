<?php $categories = $this->requestAction('categories/display'); ?>
<?php foreach ($categories as $category) { ?>
	<li><?php echo $this->Html->link($category['Category']['name'],'/danh-muc/'.$category['Category']['slug']) ?></li>
<?php } ?>