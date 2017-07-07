<div class="pull-right">
	<a href="<?php echo site_url('cost_center/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Created At</th>
		<th>Updated At</th>
		<th>Deleted At</th>
		<th>Status</th>
		<th>Name</th>
		<th>Description</th>
		<th>Actions</th>
    </tr>
	<?php foreach($cost_centers as $c){ ?>
    <tr>
		<td><?php echo $c['id']; ?></td>
		<td><?php echo $c['created_at']; ?></td>
		<td><?php echo $c['updated_at']; ?></td>
		<td><?php echo $c['deleted_at']; ?></td>
		<td><?php echo $c['status']; ?></td>
		<td><?php echo $c['name']; ?></td>
		<td><?php echo $c['description']; ?></td>
		<td>
            <a href="<?php echo site_url('cost_center/edit/'.$c['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('cost_center/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
