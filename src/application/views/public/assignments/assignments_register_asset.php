<div class='container'>

    <h2 style="margin-top:0px">Registrar Ativo</h2>
    <form action="<?php echo $action; ?>" method="post">


        <div class="form-group">
            <label for="int">Ativo<?php echo form_error('asset_id') ?></label>
            <input type="text" class="form-control" name="asset_id" id="asset_id" placeholder="Asset Id" value="<?php echo $this->uri->segment(4); ?>" />
        </div>

        <div class="form-group">
            <label for="int">id<?php echo form_error('id') ?></label>
            <input type="text" class="form-control" name="id" id="id" placeholder="Id" readonly="readonly" value="<?php echo $id; ?>" />
        </div>


        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancel</a>
    </form> 
    <br>
    
</div>