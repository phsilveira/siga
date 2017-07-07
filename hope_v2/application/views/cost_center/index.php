<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cost Centers Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('cost_center/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Deleted At</th>
						<th>Status</th>
						<th>Name</th>
						<th>Description</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($cost_centers as $c){ ?>
                    <tr>
						<td><?php echo $c['id']; ?></td>
						<td><?php echo $c['created_at']; ?></td>
						<td><?php echo $c['updated_at']; ?></td>
						<td><?php echo $c['deleted_at']; ?></td>
						<td><?php echo $c['status']; ?></td>
						<td><?php echo $c['name']; ?></td>
						<td><?php echo $c['description']; ?></td>
						<td>
                            <a href="<?php echo site_url('cost_center/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('cost_center/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
