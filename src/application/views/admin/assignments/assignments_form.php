<div class='container'>
<h2 style="margin-top:0px">Assignments <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="int">Asset Id <?php echo form_error('asset_id') ?></label>
    <input type="text" class="form-control" name="asset_id" id="asset_id" placeholder="Asset Id" value="<?php echo $asset_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Created By Person Id <?php echo form_error('created_by_person_id') ?></label>
    <input type="text" class="form-control" name="created_by_person_id" id="created_by_person_id" placeholder="Created By Person Id" value="<?php echo $created_by_person_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Assignmented For Person Id <?php echo form_error('assignmented_for_person_id') ?></label>
    <input type="text" class="form-control" name="assignmented_for_person_id" id="assignmented_for_person_id" placeholder="Assignmented For Person Id" value="<?php echo $assignmented_for_person_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Cost Center Id <?php echo form_error('cost_center_id') ?></label>
    <input type="text" class="form-control" name="cost_center_id" id="cost_center_id" placeholder="Cost Center Id" value="<?php echo $cost_center_id; ?>" />
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
    <label for="int">Origin Location Id <?php echo form_error('origin_location_id') ?></label>
    <input type="text" class="form-control" name="origin_location_id" id="origin_location_id" placeholder="Origin Location Id" value="<?php echo $origin_location_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Destiny Location Id <?php echo form_error('destiny_location_id') ?></label>
    <input type="text" class="form-control" name="destiny_location_id" id="destiny_location_id" placeholder="Destiny Location Id" value="<?php echo $destiny_location_id; ?>" />
</div>
<div class="form-group">
    <label for="datetime">Start At <?php echo form_error('start_at') ?></label>
    <input type="text" class="form-control" name="start_at" id="start_at" placeholder="Start At" value="<?php echo $start_at; ?>" />
</div>
<div class="form-group">
    <label for="datetime">End At <?php echo form_error('end_at') ?></label>
    <input type="text" class="form-control" name="end_at" id="end_at" placeholder="End At" value="<?php echo $end_at; ?>" />
</div>
<div class="form-group">
    <label for="int">Reason Id <?php echo form_error('reason_id') ?></label>
    <input type="text" class="form-control" name="reason_id" id="reason_id" placeholder="Reason Id" value="<?php echo $reason_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Item Id <?php echo form_error('item_id') ?></label>
    <input type="text" class="form-control" name="item_id" id="item_id" placeholder="Item Id" value="<?php echo $item_id; ?>" />
</div>
<div class="form-group">
    <label for="datetime">Answer At <?php echo form_error('answer_at') ?></label>
    <input type="text" class="form-control" name="answer_at" id="answer_at" placeholder="Answer At" value="<?php echo $answer_at; ?>" />
</div>
<div class="form-group">
    <label for="datetime">Scheduled At <?php echo form_error('scheduled_at') ?></label>
    <input type="text" class="form-control" name="scheduled_at" id="scheduled_at" placeholder="Scheduled At" value="<?php echo $scheduled_at; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Comments <?php echo form_error('comments') ?></label>
    <input type="text" class="form-control" name="comments" id="comments" placeholder="Comments" value="<?php echo $comments; ?>" />
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancel</a>
</form>
</div>