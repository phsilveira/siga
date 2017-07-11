<h2 style="margin-top:0px">Cost_centers <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="datetime">Created At <?php echo form_error('created_at') ?></label>
    <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
</div>
<div class="form-group">
    <label for="datetime">Updated At <?php echo form_error('updated_at') ?></label>
    <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
</div>
<div class="form-group">
    <label for="datetime">Deleted At <?php echo form_error('deleted_at') ?></label>
    <input type="text" class="form-control" name="deleted_at" id="deleted_at" placeholder="Deleted At" value="<?php echo $deleted_at; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Status <?php echo form_error('status') ?></label>
    <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Name <?php echo form_error('name') ?></label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Description <?php echo form_error('description') ?></label>
    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('cost_centers') ?>" class="btn btn-default">Cancel</a>
</form>