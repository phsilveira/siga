<div class="container">
<h2 style="margin-top:0px">Assignments <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="int">Ativo<?php echo form_error('asset_id') ?></label>
    <input type="text" class="form-control" name="asset_id" id="asset_id" placeholder="Asset Id" value="<?php echo $this->uri->segment(4); ?>" />
    <button onclick="location.href='<?php echo base_url("assignments/register").'/'."firebarcodescannerforwebsites=1"; ?>' "type="button" class="btn btn-default" aria-label="Left Align">
      <span class="glyphicon glyphicon-align-left" aria-hidden="true">código de barras</span>
    </button>
  </div>
<div class="form-group">
    <label for="int">Solicitante<?php echo form_error('created_by_person_id') ?></label>
    <input type="text" class="form-control" name="created_by_person_id" id="created_by_person_id" placeholder="Created By Person Id" value="<?php echo $created_by_person_id; ?>" />
</div>

<div class="form-group">
    <label for="datetime">Criado em<?php echo form_error('created_at') ?></label>
    <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
</div>
<div class="form-group">
    <label for="int">Origem<?php echo form_error('origin_location_id') ?></label>
    <input type="text" class="form-control" name="origin_location_id" id="origin_location_id" placeholder="Origin Location Id" value="<?php echo $origin_location_id; ?>" />
    <button onclick="location.href='<?php echo base_url("assignments/register").'/'."firebarcodescannerforwebsites=1"; ?>' "type="button" class="btn btn-default" aria-label="Left Align">
      <span class="glyphicon glyphicon-align-left" aria-hidden="true">código de barras</span>
    </button>
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
    <label for="varchar">Comments <?php echo form_error('comments') ?></label>
    <input type="text" class="form-control" name="comments" id="comments" placeholder="Comments" value="<?php echo $comments; ?>" />
</div>

<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancel</a>
</form> 
</div>