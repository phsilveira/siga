<div class="pull-right">
	<a href="<?php echo site_url('item/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Name</th>
		<th>Description</th>
		<th>Created At</th>
		<th>Updated At</th>
		<th>Deleted At</th>
		<th>Actions</th>
    </tr>
	<?php foreach($items as $i){ ?>
    <tr>
		<td><?php echo $i['id']; ?></td>
		<td><?php echo $i['name']; ?></td>
		<td><?php echo $i['description']; ?></td>
		<td><?php echo $i['created_at']; ?></td>
		<td><?php echo $i['updated_at']; ?></td>
		<td><?php echo $i['deleted_at']; ?></td>
		<td>
            <a href="<?php echo site_url('item/edit/'.$i['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('item/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
