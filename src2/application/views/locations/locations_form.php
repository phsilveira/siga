<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Locations <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Cost Center Id <?php echo form_error('cost_center_id') ?></label>
            <input type="text" class="form-control" name="cost_center_id" id="cost_center_id" placeholder="Cost Center Id" value="<?php echo $cost_center_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Floor <?php echo form_error('floor') ?></label>
            <input type="text" class="form-control" name="floor" id="floor" placeholder="Floor" value="<?php echo $floor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Block <?php echo form_error('block') ?></label>
            <input type="text" class="form-control" name="block" id="block" placeholder="Block" value="<?php echo $block; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sector <?php echo form_error('sector') ?></label>
            <input type="text" class="form-control" name="sector" id="sector" placeholder="Sector" value="<?php echo $sector; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Room <?php echo form_error('room') ?></label>
            <input type="text" class="form-control" name="room" id="room" placeholder="Room" value="<?php echo $room; ?>" />
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
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Fone <?php echo form_error('fone') ?></label>
            <input type="text" class="form-control" name="fone" id="fone" placeholder="Fone" value="<?php echo $fone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Location Type <?php echo form_error('location_type') ?></label>
            <input type="text" class="form-control" name="location_type" id="location_type" placeholder="Location Type" value="<?php echo $location_type; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('locations') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>