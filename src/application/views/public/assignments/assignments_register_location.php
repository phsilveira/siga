<div class='container'>

    <h2 style="margin-top:0px">Registrar Local</h2>
    <form action="<?php echo $action; ?>" method="post">


        <div class="form-group">
            <label for="int">Local de origem<?php echo form_error('origin_location_id') ?></label>
            <input type="text" class="form-control" name="origin_location_id" id="origin_location_id" placeholder="Origin Location Id" value="<?php echo $this->uri->segment(4); ?>" />
        </div>

        <div class="form-group">
            <label for="int">ID<?php echo form_error('id') ?></label>
            <input type="text" class="form-control" name="id" id="id" placeholder="Id" readonly="readonly" value="<?php echo $id; ?>" />
        </div>


        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancel</a>
    </form> 
    <br>
    
</div>