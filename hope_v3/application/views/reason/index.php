<div class="pull-right">
	<a href="<?php echo site_url('reason/add'); ?>" class="btn btn-success">Add</a> 
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
	<?php foreach($reasons as $r){ ?>
    <tr>
		<td><?php echo $r['id']; ?></td>
		<td><?php echo $r['name']; ?></td>
		<td><?php echo $r['description']; ?></td>
		<td><?php echo $r['created_at']; ?></td>
		<td><?php echo $r['updated_at']; ?></td>
		<td><?php echo $r['deleted_at']; ?></td>
		<td>
            <a href="<?php echo site_url('reason/edit/'.$r['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('reason/remove/'.$r['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
