<h2 style="margin-top:0px">Assets <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="int">Item Id <?php echo form_error('item_id') ?></label>
    <input type="text" class="form-control" name="item_id" id="item_id" placeholder="Item Id" value="<?php echo $item_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Cost Center Id <?php echo form_error('cost_center_id') ?></label>
    <input type="text" class="form-control" name="cost_center_id" id="cost_center_id" placeholder="Cost Center Id" value="<?php echo $cost_center_id; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Asset Tag <?php echo form_error('asset_tag') ?></label>
    <input type="text" class="form-control" name="asset_tag" id="asset_tag" placeholder="Asset Tag" value="<?php echo $asset_tag; ?>" />
</div>
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
    <label for="datetime">Acquired At <?php echo form_error('acquired_at') ?></label>
    <input type="text" class="form-control" name="acquired_at" id="acquired_at" placeholder="Acquired At" value="<?php echo $acquired_at; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Status <?php echo form_error('status') ?></label>
    <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
</div>
<div class="form-group">
    <label for="int">Status Id <?php echo form_error('status_id') ?></label>
    <input type="text" class="form-control" name="status_id" id="status_id" placeholder="Status Id" value="<?php echo $status_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Current Location Id <?php echo form_error('current_location_id') ?></label>
    <input type="text" class="form-control" name="current_location_id" id="current_location_id" placeholder="Current Location Id" value="<?php echo $current_location_id; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Description <?php echo form_error('description') ?></label>
    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
</div>
<div class="form-group">
    <label for="int">User Id <?php echo form_error('user_id') ?></label>
    <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('assets') ?>" class="btn btn-default">Cancel</a>
</form>