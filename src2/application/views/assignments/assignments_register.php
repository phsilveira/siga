
<h2 style="margin-top:0px">Assignments <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="int">Ativo Tag<?php echo form_error('asset_id') ?></label>
    <input type="text" class="form-control" name="asset_id" id="asset_id" placeholder="Asset Id" value="<?php echo $asset_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Solicitante<?php echo form_error('created_by_person_id') ?></label>
    <input type="text" class="form-control" name="created_by_person_id" id="created_by_person_id" placeholder="Created By Person Id" value="<?php echo $created_by_person_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Atendente<?php echo form_error('assignmented_for_person_id') ?></label>
    <input type="text" class="form-control" name="assignmented_for_person_id" id="assignmented_for_person_id" placeholder="Assignmented For Person Id" value="<?php echo $assignmented_for_person_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Centro de custo<?php echo form_error('cost_center_id') ?></label>
    <input type="text" class="form-control" name="cost_center_id" id="cost_center_id" placeholder="Cost Center Id" value="<?php echo $cost_center_id; ?>" />
</div>

<div class="form-group">
    <label for="int">Status<?php echo form_error('status_id') ?></label>
    <input type="text" class="form-control" name="status_id" id="status_id" placeholder="Status Id" value="<?php echo $status_id; ?>" />
</div>
<div class="form-group">
    <label for="datetime">Criado em<?php echo form_error('created_at') ?></label>
    <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
</div>
<div class="form-group">
    <label for="datetime">Modificado em<?php echo form_error('updated_at') ?></label>
    <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
</div>
<div class="form-group">
    <label for="int">Origem<?php echo form_error('origin_location_id') ?></label>
    <input type="text" class="form-control" name="origin_location_id" id="origin_location_id" placeholder="Origin Location Id" value="<?php echo $origin_location_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Destino<?php echo form_error('destiny_location_id') ?></label>
    <input type="text" class="form-control" name="destiny_location_id" id="destiny_location_id" placeholder="Destiny Location Id" value="<?php echo $destiny_location_id; ?>" />
</div>

<div class="form-group">
    <label for="int">Motivo<?php echo form_error('reason_id') ?></label>
    <input type="text" class="form-control" name="reason_id" id="reason_id" placeholder="Reason Id" value="<?php echo $reason_id; ?>" />
</div>
<div class="form-group">
    <label for="int">Item<?php echo form_error('item_id') ?></label>
    <input type="text" class="form-control" name="item_id" id="item_id" placeholder="Item Id" value="<?php echo $item_id; ?>" />
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