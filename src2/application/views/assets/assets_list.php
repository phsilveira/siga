    <div class="container top">

      <div class = "container">
        <ol class="breadcrumb"> 
          <li>
            <a href="<?php echo site_url("admin/assignments"); ?>"><?php echo ucfirst($this->uri->segment(1));?></a>
          </li> 
          <li>
            <?php echo ucfirst($this->uri->segment(2));?>
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
          
          
        <h2 style="margin-top:0px">Assets List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('assets/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('assets/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('assets'); ?>" class="btn btn-default">Reset</a>
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
                <th>No</th>
    <th>Item Id</th>
    <th>Cost Center Id</th>
    <th>Asset Tag</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th>Deleted At</th>
    <th>Acquired At</th>
    <th>Status</th>
    <th>Status Id</th>
    <th>Current Location Id</th>
    <th>Description</th>
    <th>User Id</th>
    <th>Action</th>
            </tr><?php
            foreach ($assets_data as $assets)
            {
                ?>
                <tr>
      <td width="80px"><?php echo ++$start ?></td>
      <td><?php echo $assets->item_id ?></td>
      <td><?php echo $assets->cost_center_id ?></td>
      <td><?php echo $assets->asset_tag ?></td>
      <td><?php echo $assets->created_at ?></td>
      <td><?php echo $assets->updated_at ?></td>
      <td><?php echo $assets->deleted_at ?></td>
      <td><?php echo $assets->acquired_at ?></td>
      <td><?php echo $assets->status ?></td>
      <td><?php echo $assets->status_id ?></td>
      <td><?php echo $assets->current_location_id ?></td>
      <td><?php echo $assets->description ?></td>
      <td><?php echo $assets->user_id ?></td>
      <td style="text-align:center" width="200px">
        <?php 
        echo anchor(site_url('assets/read/'.$assets->id),'Read'); 
        echo ' | '; 
        echo anchor(site_url('assets/update/'.$assets->id),'Update'); 
        echo ' | '; 
        echo anchor(site_url('assets/delete/'.$assets->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    <?php echo anchor(site_url('assets/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

          
          
      </div>
    </div>
  </div>


