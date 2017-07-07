<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Membership Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('membership/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email Addres</th>
						<th>User Name</th>
						<th>Pass Word</th>
						<th>Group</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($membership as $m){ ?>
                    <tr>
						<td><?php echo $m['id']; ?></td>
						<td><?php echo $m['first_name']; ?></td>
						<td><?php echo $m['last_name']; ?></td>
						<td><?php echo $m['email_addres']; ?></td>
						<td><?php echo $m['user_name']; ?></td>
						<td><?php echo $m['pass_word']; ?></td>
						<td><?php echo $m['group']; ?></td>
						<td>
                            <a href="<?php echo site_url('membership/edit/'.$m['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('membership/remove/'.$m['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
