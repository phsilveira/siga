<div class="container">
<h2 style="margin-top:0px">Assignments Read</h2>
<table class="table">
<tr><td>Tag Ativo</td><td><?php echo $asset_id; ?></td></tr>
<tr><td>Solicitante</td><td><?php echo $created_by_person_id; ?></td></tr>
<tr><td>Atendente</td><td><?php echo $assignmented_for_person_id; ?></td></tr>
<tr><td>Centro de custo</td><td><?php echo $cost_center_id; ?></td></tr>
<tr><td>Status</td><td><?php echo $status_id; ?></td></tr>
<tr><td>Criado em</td><td><?php echo $created_at; ?></td></tr>
<tr><td>Moficado em</td><td><?php echo $updated_at; ?></td></tr>
<tr><td>Origem</td><td><?php echo $origin_location_id; ?></td></tr>
<tr><td>Destino</td><td><?php echo $destiny_location_id; ?></td></tr>
<tr><td>Motivo</td><td><?php echo $reason_id; ?></td></tr>
<tr><td>Item</td><td><?php echo $item_id; ?></td></tr>
<tr><td>Comments</td><td><?php echo $comments; ?></td></tr>
<tr><td></td><td><a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>
</div>