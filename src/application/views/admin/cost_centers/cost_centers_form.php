<div class="container">
<h2 style="margin-top:0px">Adicionar novo centro de custo</h2>
<form action="<?php echo $action; ?>" method="post">

<div class="form-group">
    <label for="int">Motivo <?php echo form_error('reason_id') ?></label>
    <select name="status" id="status" placeholder="Status" class="form-control">
    <option value="ativo" selected="selected">Ativo</option>
    <option value="inativo">Inativo</option>
    </select>
</div>

<div class="form-group">
    <label for="varchar">Nome <?php echo form_error('name') ?></label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Descrição <?php echo form_error('description') ?></label>
    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('cost_centers') ?>" class="btn btn-default">Cancel</a>
</form>
</div>