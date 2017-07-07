<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Items Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('item/add'); ?>" class="btn btn-success btn-sm">Add</a> 
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
                    <?php foreach($items as $i){ ?>
                    <tr>
						<td><?php echo $i['id']; ?></td>
						<td><?php echo $i['name']; ?></td>
						<td><?php echo $i['description']; ?></td>
						<td><?php echo $i['created_at']; ?></td>
						<td><?php echo $i['updated_at']; ?></td>
						<td><?php echo $i['deleted_at']; ?></td>
						<td>
                            <a href="<?php echo site_url('item/edit/'.$i['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('item/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
