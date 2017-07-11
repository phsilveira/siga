<div class='container'>

    <h2 style="margin-top:0px">Assignments <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">


        <div class="form-group">
            <label for="int">Ativo<?php echo form_error('asset_id') ?></label>
            <input type="text" class="form-control" name="asset_id" id="asset_id" placeholder="Asset Id" value="<?php echo $this->uri->segment(4); ?>" />
        </div>

        <div class="form-group">
            <label for="int">Destino<?php echo form_error('destiny_location_id') ?></label>
            <input type="text" class="form-control" name="destiny_location_id" id="destiny_location_id" placeholder="Origin Location Id" value="<?php echo $destiny_location_id; ?>" />
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancel</a>
    </form> 
    <br>
    <table class="table">
        <tr><td>Motivo</td><td><?php echo $reason; ?></td></tr>
        <tr><td>Item</td><td><?php echo $item; ?></td></tr>
        <tr><td>Solicitante</td><td><?php echo $created_by_person; ?></td></tr>
        <tr><td>Centro de custo</td><td><?php echo $cost_center; ?></td></tr>
        <tr><td>Criado em</td><td><?php echo $created_at; ?></td></tr>
        <tr><td>Origem</td><td><a href="<?php site_url("assets/read/".$origin_location_id) ?>"><?php echo $origin_location_id; ?></a></td></tr>
        <tr><td>Destino</td><td><a href="<?php site_url("assets/read/".$destiny_location_id) ?>"><?php echo $destiny_location_id; ?></a></td></tr>
        <tr><td>Comments</td><td><?php echo $comments; ?></td></tr>
    </table>
</div>