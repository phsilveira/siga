<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Assignment History Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('assignment_history/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Assignment Id</th>
						<th>Person Id</th>
						<th>Status</th>
						<th>Created At</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($assignment_history as $a){ ?>
                    <tr>
						<td><?php echo $a['id']; ?></td>
						<td><?php echo $a['assignment_id']; ?></td>
						<td><?php echo $a['person_id']; ?></td>
						<td><?php echo $a['status']; ?></td>
						<td><?php echo $a['created_at']; ?></td>
						<td>
                            <a href="<?php echo site_url('assignment_history/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('assignment_history/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
