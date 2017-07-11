<h2 style="margin-top:0px">Cost_centers List</h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('cost_centers/create'),'Create', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('cost_centers/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                        if ($q <> '')
                        {
                            ?>
                            <a href="<?php echo site_url('cost_centers'); ?>" class="btn btn-default">Reset</a>
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
<th>Created At</th>
<th>Updated At</th>
<th>Deleted At</th>
<th>Status</th>
<th>Name</th>
<th>Description</th>
<th>Action</th>
    </tr><?php
    foreach ($cost_centers_data as $cost_centers)
    {
        ?>
        <tr>
	<td width="80px"><?php echo ++$start ?></td>
	<td><?php echo $cost_centers->created_at ?></td>
	<td><?php echo $cost_centers->updated_at ?></td>
	<td><?php echo $cost_centers->deleted_at ?></td>
	<td><?php echo $cost_centers->status ?></td>
	<td><?php echo $cost_centers->name ?></td>
	<td><?php echo $cost_centers->description ?></td>
	<td style="text-align:center" width="200px">
		<?php 
		echo anchor(site_url('cost_centers/read/'.$cost_centers->id),'Read'); 
		echo ' | '; 
		echo anchor(site_url('cost_centers/update/'.$cost_centers->id),'Update'); 
		echo ' | '; 
		echo anchor(site_url('cost_centers/delete/'.$cost_centers->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
<?php echo anchor(site_url('cost_centers/excel'), 'Excel', 'class="btn btn-primary"'); ?>
</div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
