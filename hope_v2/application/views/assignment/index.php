<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Assignments Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('assignment/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Asset Id</th>
						<th>Created By Person Id</th>
						<th>Assignmented For Person Id</th>
						<th>Cost Center Id</th>
						<th>Status Id</th>
						<th>Origin Location Id</th>
						<th>Destiny Location Id</th>
						<th>Reason Id</th>
						<th>Item Id</th>
						<th>Status</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Deleted At</th>
						<th>Start At</th>
						<th>End At</th>
						<th>Answer At</th>
						<th>Scheduled At</th>
						<th>Comments</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($assignments as $a){ ?>
                    <tr>
						<td><?php echo $a['id']; ?></td>
						<td><?php echo $a['asset_id']; ?></td>
						<td><?php echo $a['created_by_person_id']; ?></td>
						<td><?php echo $a['assignmented_for_person_id']; ?></td>
						<td><?php echo $a['cost_center_id']; ?></td>
						<td><?php echo $a['status_id']; ?></td>
						<td><?php echo $a['origin_location_id']; ?></td>
						<td><?php echo $a['destiny_location_id']; ?></td>
						<td><?php echo $a['reason_id']; ?></td>
						<td><?php echo $a['item_id']; ?></td>
						<td><?php echo $a['status']; ?></td>
						<td><?php echo $a['created_at']; ?></td>
						<td><?php echo $a['updated_at']; ?></td>
						<td><?php echo $a['deleted_at']; ?></td>
						<td><?php echo $a['start_at']; ?></td>
						<td><?php echo $a['end_at']; ?></td>
						<td><?php echo $a['answer_at']; ?></td>
						<td><?php echo $a['scheduled_at']; ?></td>
						<td><?php echo $a['comments']; ?></td>
						<td>
                            <a href="<?php echo site_url('assignment/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('assignment/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
