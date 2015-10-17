<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>id</th>
      <th>Title</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($newsPost as $new) { ?>
	    <tr>
	      <td><?php echo $new['NewsPost']['id'] ?></td>
	      <td><?php echo $new['NewsPost']['title'] ?></td>
	      <td><?php echo $this->Html->link('Edit','/NewsPosts/admin_edit/'.$new['NewsPost']['id']) ?></td>
	    </tr>
  	<?php } ?>
  </tbody>
</table> 