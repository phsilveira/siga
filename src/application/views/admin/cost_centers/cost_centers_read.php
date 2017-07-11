<div class="container">
<h2 style="margin-top:0px">Centro de custo</h2>
<table class="table">
<tr><td>Criado</td><td><?php echo $created_at; ?></td></tr>
<tr><td>Modificado</td><td><?php echo $updated_at; ?></td></tr>
<tr><td>Status</td><td><?php echo $status; ?></td></tr>
<tr><td>Nome</td><td><?php echo $name; ?></td></tr>
<tr><td>Descrição</td><td><?php echo $description; ?></td></tr>
<tr><td></td><td><a href="<?php echo site_url('cost_centers') ?>" class="btn btn-default">Cancelar</a></td></tr>
</table>
</div>