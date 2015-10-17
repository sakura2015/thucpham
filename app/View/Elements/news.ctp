<?php $categories1 = $this->requestAction('categories/newsPost'); ?>
<?php foreach ($categories1 as $category) { ?>
	<li><?php echo $this->Html->link($category['Category']['name'],'/tin-tuc/'.$category['Category']['slug']) ?></li>
<?php } ?>