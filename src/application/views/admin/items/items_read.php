<h2 style="margin-top:0px">Items Read</h2>
<table class="table">
<tr><td>Name</td><td><?php echo $name; ?></td></tr>
<tr><td>Description</td><td><?php echo $description; ?></td></tr>
<tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
<tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
<tr><td>Deleted At</td><td><?php echo $deleted_at; ?></td></tr>
<tr><td></td><td><a href="<?php echo site_url('items') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>