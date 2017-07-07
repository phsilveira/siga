<div class="pull-right">
	<a href="<?php echo site_url('asset/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Item Id</th>
		<th>Cost Center Id</th>
		<th>Status Id</th>
		<th>Current Location Id</th>
		<th>User Id</th>
		<th>Asset Tag</th>
		<th>Created At</th>
		<th>Updated At</th>
		<th>Deleted At</th>
		<th>Acquired At</th>
		<th>Status</th>
		<th>Description</th>
		<th>Actions</th>
    </tr>
	<?php foreach($assets as $a){ ?>
    <tr>
		<td><?php echo $a['id']; ?></td>
		<td><?php echo $a['item_id']; ?></td>
		<td><?php echo $a['cost_center_id']; ?></td>
		<td><?php echo $a['status_id']; ?></td>
		<td><?php echo $a['current_location_id']; ?></td>
		<td><?php echo $a['user_id']; ?></td>
		<td><?php echo $a['asset_tag']; ?></td>
		<td><?php echo $a['created_at']; ?></td>
		<td><?php echo $a['updated_at']; ?></td>
		<td><?php echo $a['deleted_at']; ?></td>
		<td><?php echo $a['acquired_at']; ?></td>
		<td><?php echo $a['status']; ?></td>
		<td><?php echo $a['description']; ?></td>
		<td>
            <a href="<?php echo site_url('asset/edit/'.$a['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('asset/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
