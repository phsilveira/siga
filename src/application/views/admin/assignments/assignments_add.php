
<div class='container'>
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
        

        <!-- <input type="text" class="form-control" name="reason_id" id="reason_id" placeholder="Reason Id" value="<?php echo $reason_id; ?>" /> -->

        <div class="form-group">
            <label for="int">Motivo <?php echo form_error('reason_id') ?></label>
            <select name="reason_id" class="form-control">
            <option value="0" selected="selected">----</option>
            <option value="1">Remoção</option>
            <option value="2">Substituição</option>
            <option value="3">Reparo</option>
            <option value="4">Mudança</option>
            <option value="5">Inclusão</option>
            </select>
        </div>

        <div class="form-group">
            <label for="int">Item <?php echo form_error('item_id') ?></label>
            <select name="item_id" class="form-control">
            <option value="0" selected="selected">----</option>
            <option value="1">Cama</option>
            <option value="2">Colchão</option>
            <option value="3">Criado-mudo</option>
            <option value="4">Suporte de soro</option>
            <option value="5">Poltrona</option>
            <option value="6">Cadeira</option>
            <option value="7">Sofa</option>
            <option value="8">Mesa</option>
            <option value="9">Suporte de Humper</option>
            </select>
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
</div>