<div class="container">
<h2 style="margin-top:0px">Locations <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    

    <select name="cost_center_id" class="form-control">
    <option value="">Selecionar</option>
    <?php 
    foreach($all_cost_centers as $cost_center)
    {
            $selected = ($cost_center->id == $this->input->post('cost_center_id')) ? ' selected="selected"' : "";

            echo '<option value="'.$cost_center->id.'" '.$selected.'>'.$cost_center->name.'</option>';
    } 
    ?>
    </select>

</div>
<div class="form-group">
    <label for="varchar">Andar <?php echo form_error('floor') ?></label>
    <input type="text" class="form-control" name="floor" id="floor" placeholder="Floor" value="<?php echo $floor; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Bloco <?php echo form_error('block') ?></label>
    <input type="text" class="form-control" name="block" id="block" placeholder="Block" value="<?php echo $block; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Setor <?php echo form_error('sector') ?></label>
    <input type="text" class="form-control" name="sector" id="sector" placeholder="Sector" value="<?php echo $sector; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Quarto<?php echo form_error('room') ?></label>
    <input type="text" class="form-control" name="room" id="room" placeholder="Room" value="<?php echo $room; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Telefone<?php echo form_error('fone') ?></label>
    <input type="text" class="form-control" name="fone" id="fone" placeholder="Fone" value="<?php echo $fone; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Tipo de local <?php echo form_error('location_type') ?></label>
    <input type="text" class="form-control" name="location_type" id="location_type" placeholder="Location Type" value="<?php echo $location_type; ?>" />
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('locations') ?>" class="btn btn-default">Cancel</a>
</form>
</div>