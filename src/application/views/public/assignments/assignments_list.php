<div class="container">
  <h2 style="margin-top:0px">Assignments List</h2>
  <div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
      <?php echo anchor(site_url('assignments/create'),'Create', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
      <div style="margin-top: 8px" id="message">
        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
      </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
      <form action="<?php echo site_url('assignments/index'); ?>" class="form-inline" method="get">
        <div class="input-group">
          <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
          <span class="input-group-btn">
            <?php 
            if ($q <> '')
            {
              ?>
              <a href="<?php echo site_url('assignments'); ?>" class="btn btn-default">Reset</a>
              <?php
            }
            ?>
            <button class="btn btn-primary" type="submit">Search</button>
          </span>
        </div>
      </form>
    </div>
  </div>
  <table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
      <th>Action</th>
      <th>Criado em</th>
      <th>row</th>
      <th>ID</th>
      <th>Ativo</th>
      <th>Solicitante</th>
      <th>Atendente</th>
      <th>Status</th>
      <th>Origem</th>
      <th>Destino</th>
      <th>Motivo</th>
      <th>Item</th>
    </tr><?php
    foreach ($assignments_data as $assignments)
    {
      ?>
      <tr>
        <td style="text-align:center" width="200px">
          <?php 
          echo anchor(site_url('assignments/read/'.$assignments->id),'Read'); 
          echo ' | '; 
          echo anchor(site_url('assignments/update/'.$assignments->id),'Update'); 
          echo ' | '; 
          echo anchor(site_url('assignments/delete/'.$assignments->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
          ?>
        </td>
        <td><?php echo $assignments->created_at ?></td>
        <td width="80px"><?php echo ++$start ?></td>
        <td><a href="<?php echo site_url('assignments/read/'.$assignments->id); ?>"><?php echo $assignments->id ?></a></td>
        <td><?php echo $assignments->asset_id ?></td>
        <td><?php foreach($users as $user){if ($user->id == $assignments->created_by_person_id){echo $user->user_name;}} ?></td>
        <td><?php foreach($users as $user){if ($user->id == $assignments->assignmented_for_person_id){echo $user->user_name;}} ?></td>
        <td><?php foreach($status as $statu){if ($statu->id == $assignments->status_id){echo $statu->name;}} ?></td>
        <td><?php echo $assignments->origin_location_id ?></td>
        <td><?php echo $assignments->destiny_location_id ?></td>
        <td><?php foreach($reasons as $reason){if ($reason->id == $assignments->reason_id){echo $reason->name;}} ?></td>
        <td><?php foreach($items as $item){if ($item->id == $assignments->item_id){echo $item->name;}} ?></td>
      </tr>
      <?php
    }
    ?>
  </table>
  <div class="row">
    <div class="col-md-6">
      <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
      <?php echo anchor(site_url('assignments/excel'), 'Excel', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-6 text-right">
      <?php echo $pagination ?>
    </div>
  </div>
</div>