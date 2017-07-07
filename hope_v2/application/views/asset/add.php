<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Asset Add</h3>
            </div>
            <?php echo form_open('asset/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="item_id" class="control-label">Item</label>
						<div class="form-group">
							<select name="item_id" class="form-control">
								<option value="">select item</option>
								<?php 
								foreach($all_items as $item)
								{
									$selected = ($item['id'] == $this->input->post('item_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$item['id'].'" '.$selected.'>'.$item['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cost_center_id" class="control-label">Cost Center</label>
						<div class="form-group">
							<select name="cost_center_id" class="form-control">
								<option value="">select cost_center</option>
								<?php 
								foreach($all_cost_centers as $cost_center)
								{
									$selected = ($cost_center['id'] == $this->input->post('cost_center_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$cost_center['id'].'" '.$selected.'>'.$cost_center['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status_id" class="control-label"><span class="text-danger">*</span>Assignment Statu</label>
						<div class="form-group">
							<select name="status_id" class="form-control">
								<option value="">select assignment_statu</option>
								<?php 
								foreach($all_assignment_status as $assignment_statu)
								{
									$selected = ($assignment_statu['id'] == $this->input->post('status_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$assignment_statu['id'].'" '.$selected.'>'.$assignment_statu['name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('status_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="current_location_id" class="control-label"><span class="text-danger">*</span>Location</label>
						<div class="form-group">
							<select name="current_location_id" class="form-control">
								<option value="">select location</option>
								<?php 
								foreach($all_locations as $location)
								{
									$selected = ($location['id'] == $this->input->post('current_location_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$location['id'].'" '.$selected.'>'.$location['id'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('current_location_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="user_id" class="control-label">Membership</label>
						<div class="form-group">
							<select name="user_id" class="form-control">
								<option value="">select membership</option>
								<?php 
								foreach($all_membership as $membership)
								{
									$selected = ($membership['id'] == $this->input->post('user_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$membership['id'].'" '.$selected.'>'.$membership['user_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('user_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="asset_tag" class="control-label"><span class="text-danger">*</span>Asset Tag</label>
						<div class="form-group">
							<input type="text" name="asset_tag" value="<?php echo $this->input->post('asset_tag'); ?>" class="form-control" id="asset_tag" />
							<span class="text-danger"><?php echo form_error('asset_tag');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="created_at" class="control-label">Created At</label>
						<div class="form-group">
							<input type="text" name="created_at" value="<?php echo $this->input->post('created_at'); ?>" class="has-datetimepicker form-control" id="created_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="updated_at" class="control-label">Updated At</label>
						<div class="form-group">
							<input type="text" name="updated_at" value="<?php echo $this->input->post('updated_at'); ?>" class="has-datetimepicker form-control" id="updated_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="deleted_at" class="control-label">Deleted At</label>
						<div class="form-group">
							<input type="text" name="deleted_at" value="<?php echo $this->input->post('deleted_at'); ?>" class="has-datetimepicker form-control" id="deleted_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="acquired_at" class="control-label">Acquired At</label>
						<div class="form-group">
							<input type="text" name="acquired_at" value="<?php echo $this->input->post('acquired_at'); ?>" class="has-datetimepicker form-control" id="acquired_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" />
							<span class="text-danger"><?php echo form_error('status');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="description" class="control-label">Description</label>
						<div class="form-group">
							<input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control" id="description" />
							<span class="text-danger"><?php echo form_error('description');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>