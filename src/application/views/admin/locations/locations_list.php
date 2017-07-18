<div class="container">
<h2 style="margin-top:0px">Locais</h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('locations/create'),'Create', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('locations/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                    if ($q <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('locations'); ?>" class="btn btn-default">Reset</a>
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
        <th>#</th>
        <th>ID</th>
        <th>Tag</th>
        <th>Centro de custo</th>
        <th>Andar</th>
        <th>Bloco</th>
        <th>Setor</th>
        <th>Quarto</th>
        <th>Criado</th>
        <th>Modificado</th>
        <th>Status</th>
        <th>Ramal</th>
        <th>Tipo de local</th>
        <th>Action</th>
    </tr><?php
    foreach ($locations_data as $locations)
    {
        ?>
        <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $locations->id ?></td>
            <td><?php echo $locations->tag ?></td>
            <td><?php echo $locations->cost_center_id ?></td>
            <td><?php echo $locations->floor ?></td>
            <td><?php echo $locations->block ?></td>
            <td><?php echo $locations->sector ?></td>
            <td><?php echo $locations->room ?></td>
            <td><?php echo $locations->created_at ?></td>
            <td><?php echo $locations->updated_at ?></td>
            <td><?php echo $locations->status ?></td>
            <td><?php echo $locations->fone ?></td>
            <td><?php echo $locations->location_type ?></td>
            <td style="text-align:center" width="200px">
               <?php 
               echo anchor(site_url('locations/read/'.$locations->id),'Read'); 
               echo ' | '; 
               echo anchor(site_url('locations/update/'.$locations->id),'Update'); 
               echo ' | '; 
               echo anchor(site_url('locations/delete/'.$locations->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
               ?>
           </td>
       </tr>
       <?php
   }
   ?>
</table>
<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('locations/excel'), 'Excel', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
</div>