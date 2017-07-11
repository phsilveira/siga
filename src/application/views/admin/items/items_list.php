<h2 style="margin-top:0px">Items List</h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('items/create'),'Create', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('items/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                        if ($q <> '')
                        {
                            ?>
                            <a href="<?php echo site_url('items'); ?>" class="btn btn-default">Reset</a>
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
<th>Name</th>
<th>Description</th>
<th>Created At</th>
<th>Updated At</th>
<th>Deleted At</th>
<th>Action</th>
    </tr><?php
    foreach ($items_data as $items)
    {
        ?>
        <tr>
	<td width="80px"><?php echo ++$start ?></td>
	<td><?php echo $items->name ?></td>
	<td><?php echo $items->description ?></td>
	<td><?php echo $items->created_at ?></td>
	<td><?php echo $items->updated_at ?></td>
	<td><?php echo $items->deleted_at ?></td>
	<td style="text-align:center" width="200px">
		<?php 
		echo anchor(site_url('items/read/'.$items->id),'Read'); 
		echo ' | '; 
		echo anchor(site_url('items/update/'.$items->id),'Update'); 
		echo ' | '; 
		echo anchor(site_url('items/delete/'.$items->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
<?php echo anchor(site_url('items/excel'), 'Excel', 'class="btn btn-primary"'); ?>
</div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>