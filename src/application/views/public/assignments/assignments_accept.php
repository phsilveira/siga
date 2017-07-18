<div class='container'>
	<h2 style="margin-top:0px">Aceitar Chamado</h2>
	<form action="<?php echo $action; ?>" method="post">
		<table class="table">
			<tr><td>Motivo</td><td><?php echo $reason; ?></td></tr>
			<tr><td>Item</td><td><?php echo $item; ?></td></tr>
			<tr><td>Solicitante</td><td><?php echo $created_by_person; ?></td></tr>
			<tr><td>Centro de custo</td><td><?php echo $cost_center; ?></td></tr>
			<tr><td>Criado em</td><td><?php echo $created_at; ?></td></tr>
			<tr><td>Origem</td><td><a href="<?php echo site_url('locations/read/'.$origin_location_id) ?>"><?php echo $origin_location_id; ?></a></td></tr>
			<tr><td>Destino</td><td><a href="<?php echo site_url("locations/read/".$destiny_location_id) ?>"><?php echo $destiny_location_id; ?></a></td></tr>
			<tr><td>Comentários</td><td><?php echo $comments; ?></td></tr>
		</table>
		<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
		<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
		<a href="<?php echo site_url('assignments') ?>" class="btn btn-default">Cancelar</a>
	</form> 
</div>