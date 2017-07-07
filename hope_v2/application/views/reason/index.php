<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reasons Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('reason/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Deleted At</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($reasons as $r){ ?>
                    <tr>
						<td><?php echo $r['id']; ?></td>
						<td><?php echo $r['name']; ?></td>
						<td><?php echo $r['description']; ?></td>
						<td><?php echo $r['created_at']; ?></td>
						<td><?php echo $r['updated_at']; ?></td>
						<td><?php echo $r['deleted_at']; ?></td>
						<td>
                            <a href="<?php echo site_url('reason/edit/'.$r['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('reason/remove/'.$r['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
