<div class="pull-right">
	<a href="<?php echo site_url('membership/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email Addres</th>
		<th>User Name</th>
		<th>Pass Word</th>
		<th>Group</th>
		<th>Actions</th>
    </tr>
	<?php foreach($membership as $m){ ?>
    <tr>
		<td><?php echo $m['id']; ?></td>
		<td><?php echo $m['first_name']; ?></td>
		<td><?php echo $m['last_name']; ?></td>
		<td><?php echo $m['email_addres']; ?></td>
		<td><?php echo $m['user_name']; ?></td>
		<td><?php echo $m['pass_word']; ?></td>
		<td><?php echo $m['group']; ?></td>
		<td>
            <a href="<?php echo site_url('membership/edit/'.$m['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('membership/remove/'.$m['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
