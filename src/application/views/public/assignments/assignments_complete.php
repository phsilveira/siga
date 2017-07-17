<div class='container'>

    <h2 style="margin-top:0px">Assignments <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">


        <div class="form-group">
            <!-- <label for="int">Ativo<?php echo form_error('asset_id') ?></label> -->
            <button onclick="location.href='<?php echo $register_asset; ?>' "type="button" class="btn btn-default" aria-label="Left Align">Registrar Ativo</button>
        </div>

        <div class="form-group">
            <!-- <label for="int">Origem<?php echo form_error('origin_location_id') ?></label> -->
            <!-- <input type="text" class="form-control" name="origin_location_id" id="origin_location_id" placeholder="Origin Location Id" value="<?php echo $origin_location_id; ?>" /> -->
            <button onclick="location.href='<?php echo $register_location; ?>' "type="button" class="btn btn-default" aria-label="Left Align">Registrar Local Origem</button>
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