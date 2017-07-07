<div class="container top">

  <div class = "container">
    <ol class="breadcrumb"> 
      <li>
        <a href="<?php echo site_url("admin/assignments"); ?>"><?php echo ucfirst($this->uri->segment(1));?></a>
      </li> 
      


    </ol>
  </div>

  <div class="page-header users-header">
    <h2>
      <!-- <?php echo ucfirst($this->uri->segment(2));?>  -->
      Chamados
      <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Novo Chamado</a>
    </h2>
  </div>


<div class="row">
    <div class="span12 columns">

    <div class="well">
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
            $options_item = array(0 => "todos", 1 => 'item1');
            // foreach ($items as $row)
            // {
            //   $options_item[$row['id']] = $row['name'];
            // }

            $options_reason = array(0 => "todos", 1 => 'reason1');
            // foreach ($reasons as $row)
            // {
            //   $options_reason[$row['id']] = $row['name'];
            // }

            $options_status = array(0 => "todos", 1 => 'status_1');


            // if ($this->uri->segment(3) == false) {
            //   $options_status = array(0 => "todos");
            //   foreach ($status as $row)
            //   {
            //     $options_status[$row['id']] = $row['name'];
            //   }
            // }

            $options_assignments = array(0 => '0', 1 => '1');    

            //save the columns names in a array that we will use as filter         
            // $options_assignments = array();    
            // foreach ($assignments as $array) {
            //   foreach ($array as $key => $value) {
            //     $options_assignments[$key] = $key;
            //   }
            //   break;
            // }

            if ($this->uri->segment(2) == 'open') {
              echo form_open('assignment/open', $attributes);  
            } elseif ($this->uri->segment(2) == 'completed') {
              echo form_open('assignment/completed', $attributes);  
            } else {
              echo form_open('assignment', $attributes);  
            }
              
            echo form_label('Usuário:', 'search_string');
            echo form_input('search_string', $search_string_selected, 'style="width: 170px;
height: 26px;"');

            echo '<br><br>';

            echo form_label('Item:', 'item_id');
            echo form_dropdown('item_id', $options_item, $item_selected, 'class="span2"');

            echo '<br><br>';

            echo form_label('Motivo:', 'reason_id');
            echo form_dropdown('reason_id', $options_reason, $reason_selected, 'class="span2"');

            echo '<br><br>';

            if ($this->uri->segment(3) == false) {
              echo form_label('Status:', 'status_id');
              echo form_dropdown('status_id', $options_status, $status_selected, 'class="span2"');  
              echo '<br><br>';
            } 

            echo form_label('Ordenar por:', 'order');
            echo form_dropdown('order', $options_assignments, $order, 'class="span2"');

            $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

            $options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
            echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');

            echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>


        <div class="container">
			<table class="table table-bordered table-responsive">
			    <tr>
			    	<th>Created At</th>
			    	<th>Actions</th>
			    	<th>ID</th>
					
					<th>Tag</th>
					<th>Solicitante</th>
					<th>Atendente</th>
					<th>Status</th>
					<th>Origem</th>
					<th>Destino</th>
					<th>Motivo</th>
					<th>Item</th>
					
			    </tr>
				<?php foreach($assignments as $a){ ?>
			    <tr>
			    	<td><?php echo $a['created_at']; ?></td>
			    	
			    	<td>
			            <a href="<?php echo site_url('assignment/edit/'.$a['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
			            <a href="<?php echo site_url('assignment/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
			        </td>
			        <?php 
			        	// echo '<td class="crud-actions">';
                    
	           //          if ($a['status_id'] == 2){
	           //            echo site_url('assignment/accept/'.$a['id']).'class="btn btn-primary">Aceitar</a>';
	           //          }
	           //          if ($a['status_id'] == 3 && $a['assignmented_for_username'] == $this->session->userdata('user_name') ) {
	           //            echo site_url('assignment/register/'.$a['id']).'" class="btn btn-warning">Registrar</a>';
	           //          }

	           //          if ($a['status_id'] == 4 && $a['assignmented_for_username'] == $this->session->userdata('user_name')){
	           //            echo site_url('assignment/complete/'.$a['id']).'" class="btn btn-success">Finalizar</a>';
	           //          }

	           //          echo '</td>';
			        ?>

			        <?php echo '<td><a href="'.site_url('/assignments/update/').$a['id'].'">'.$a['id'].'</a></td>'; ?>
					
					<td><?php echo $a['asset_id']; ?></td>
					
					<td><?php echo $a['created_by_person_id']; ?></td>
					
					<td><?php echo $a['assignmented_for_person_id']; ?></td>
					
					<td><?php echo $a['status_id']; ?></td>
					<td><?php echo $a['origin_location_id']; ?></td>
					<td><?php echo $a['destiny_location_id']; ?></td>
					
					<td><?php echo $a['reason_id']; ?></td>
					<td><?php echo $a['item_id']; ?></td>
					
			    </tr>
				<?php } ?>
			</table>
		</div>
		<div class="pull-right">

		    <?php echo $this->pagination->create_links(); ?>    
		</div>
	</div>
</div>