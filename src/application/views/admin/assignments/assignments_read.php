<div class='container'>
<h2 style="margin-top:0px">Assignments Read</h2>
<table class="table">
<tr><td>Motivo</td><td><?php echo $reason; ?></td></tr>
<tr><td>Item</td><td><?php echo $item; ?></td></tr>
<tr><td>Ativo</td><td><a href="<?php site_url("assets/read/".$asset_id) ?>"><?php echo $asset_id; ?></a></td></tr>
<tr><td>Solicitante</td><td><?php echo $created_by_person; ?></td></tr>
<tr><td>Atendente</td><td><?php echo $assignmented_for_person; ?></td></tr>
<tr><td>Centro de custo</td><td><?php echo $cost_center; ?></td></tr>
<tr><td>Status</td><td><?php echo $status; ?></td></tr>
<tr><td>Criado em</td><td><?php echo $created_at; ?></td></tr>
<tr><td>Aceito em</td><td><?php echo $accepted_at; ?></td></tr>
<tr><td>Registrado em</td><td><?php echo $register_at; ?></td></tr>
<tr><td>Finalizado em</td><td><?php echo $completed_at; ?></td></tr>
<tr><td>Moficado em</td><td><?php echo $updated_at; ?></td></tr>
<tr><td>Origem</td><td><a href="<?php site_url("assets/read/".$origin_location_id) ?>"><?php echo $origin_location_id; ?></a></td></tr>
<tr><td>Destino</td><td><a href="<?php site_url("assets/read/".$destiny_location_id) ?>"><?php echo $destiny_location_id; ?></a></td></tr>
<tr><td>Comments</td><td><?php echo $comments; ?></td></tr>
<tr><td></td><td><a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>
</div>