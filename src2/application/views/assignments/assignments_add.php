
<h2 style="margin-top:0px">Assignments <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">

    
    <div class="form-group">
        <label for="int">Centro de custo<?php echo form_error('cost_center_id') ?></label>
        <input type="text" class="form-control" name="cost_center_id" id="cost_center_id" placeholder="Cost Center Id" value="<?php echo $cost_center_id; ?>" />
    </div>

    <div class="form-group">
        <label for="int">Origem <?php echo form_error('origin_location_id') ?></label>
        <input type="text" class="form-control" name="origin_location_id" id="origin_location_id" placeholder="Origin Location Id" value="<?php echo $origin_location_id; ?>" />
    </div>
    
    <div class="form-group">
        <label for="int">Motivo <?php echo form_error('reason_id') ?></label>
        <input type="text" class="form-control" name="reason_id" id="reason_id" placeholder="Reason Id" value="<?php echo $reason_id; ?>" />
    </div>
    <div class="form-group">
        <label for="int">Item <?php echo form_error('item_id') ?></label>
        <input type="text" class="form-control" name="item_id" id="item_id" placeholder="Item Id" value="<?php echo $item_id; ?>" />
    </div>
    
    <div class="form-group">
        <label for="datetime">Agendar para <?php echo form_error('scheduled_at') ?></label>
        <input type="text" class="form-control" name="scheduled_at" id="scheduled_at" placeholder="Scheduled At" value="<?php echo $scheduled_at; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Comentários<?php echo form_error('comments') ?></label>
        <input type="text" class="form-control" name="comments" id="comments" placeholder="Comments" value="<?php echo $comments; ?>" />
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancel</a>
</form> 