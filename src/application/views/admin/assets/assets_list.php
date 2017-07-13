    <div class="container top">

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
              <th>Criado</th>
              <th>#</th>
              <th>ID</th>
              <th>Item</th>
              <th>Centro de custo</th>
              <th>Tag</th>
              
              
              <th>Action</th>
            </tr><?php
            foreach ($assets_data as $assets)
            {
              ?>
              <tr>
                <td><?php echo $assets->created_at ?></td>
                <td width="80px"><?php echo ++$start ?></td>
                <td><?php echo $assets->id ?></td>
                <td><?php foreach($items as $item){if ($item->id == $assets->item_id){echo $item->name;}} ?></td>
                <td><?php foreach($cost_centers as $cost_center){if ($cost_center->id == $assets->cost_center_id){echo $cost_center->name;}} ?></td>
                <td><?php echo $assets->asset_tag ?></td>
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


