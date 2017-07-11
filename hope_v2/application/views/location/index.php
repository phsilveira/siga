<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Locations Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('location/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Cost Center Id</th>
						<th>Floor</th>
						<th>Block</th>
						<th>Sector</th>
						<th>Room</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Deleted At</th>
						<th>Status</th>
						<th>Fone</th>
						<th>Location Type</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($locations as $l){ ?>
                    <tr>
						<td><?php echo $l['id']; ?></td>
						<td><?php echo $l['cost_center_id']; ?></td>
						<td><?php echo $l['floor']; ?></td>
						<td><?php echo $l['block']; ?></td>
						<td><?php echo $l['sector']; ?></td>
						<td><?php echo $l['room']; ?></td>
						<td><?php echo $l['created_at']; ?></td>
						<td><?php echo $l['updated_at']; ?></td>
						<td><?php echo $l['deleted_at']; ?></td>
						<td><?php echo $l['status']; ?></td>
						<td><?php echo $l['fone']; ?></td>
						<td><?php echo $l['location_type']; ?></td>
						<td>
                            <a href="<?php echo site_url('location/edit/'.$l['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('location/remove/'.$l['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>