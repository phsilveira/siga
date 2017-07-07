<?php echo form_open('asset/edit/'.$asset['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="item_id" class="col-md-4 control-label">Item</label>
		<div class="col-md-8">
			<select name="item_id" class="form-control">
				<option value="">select item</option>
				<?php 
				foreach($all_items as $item)
				{
					$selected = ($item['id'] == $asset['item_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$item['id'].'" '.$selected.'>'.$item['name'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="cost_center_id" class="col-md-4 control-label">Cost Center</label>
		<div class="col-md-8">
			<select name="cost_center_id" class="form-control">
				<option value="">select cost_center</option>
				<?php 
				foreach($all_cost_centers as $cost_center)
				{
					$selected = ($cost_center['id'] == $asset['cost_center_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$cost_center['id'].'" '.$selected.'>'.$cost_center['name'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="status_id" class="col-md-4 control-label"><span class="text-danger">*</span>Assignment Statu</label>
		<div class="col-md-8">
			<select name="status_id" class="form-control">
				<option value="">select assignment_statu</option>
				<?php 
				foreach($all_assignment_status as $assignment_statu)
				{
					$selected = ($assignment_statu['id'] == $asset['status_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$assignment_statu['id'].'" '.$selected.'>'.$assignment_statu['name'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('status_id');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="current_location_id" class="col-md-4 control-label"><span class="text-danger">*</span>Location</label>
		<div class="col-md-8">
			<select name="current_location_id" class="form-control">
				<option value="">select location</option>
				<?php 
				foreach($all_locations as $location)
				{
					$selected = ($location['id'] == $asset['current_location_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$location['id'].'" '.$selected.'>'.$location['id'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('current_location_id');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="user_id" class="col-md-4 control-label">Membership</label>
		<div class="col-md-8">
			<select name="user_id" class="form-control">
				<option value="">select membership</option>
				<?php 
				foreach($all_membership as $membership)
				{
					$selected = ($membership['id'] == $asset['user_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$membership['id'].'" '.$selected.'>'.$membership['user_name'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('user_id');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="asset_tag" class="col-md-4 control-label"><span class="text-danger">*</span>Asset Tag</label>
		<div class="col-md-8">
			<input type="text" name="asset_tag" value="<?php echo ($this->input->post('asset_tag') ? $this->input->post('asset_tag') : $asset['asset_tag']); ?>" class="form-control" id="asset_tag" />
			<span class="text-danger"><?php echo form_error('asset_tag');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="created_at" class="col-md-4 control-label">Created At</label>
		<div class="col-md-8">
			<input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $asset['created_at']); ?>" class="form-control" id="created_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="updated_at" class="col-md-4 control-label">Updated At</label>
		<div class="col-md-8">
			<input type="text" name="updated_at" value="<?php echo ($this->input->post('updated_at') ? $this->input->post('updated_at') : $asset['updated_at']); ?>" class="form-control" id="updated_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="deleted_at" class="col-md-4 control-label">Deleted At</label>
		<div class="col-md-8">
			<input type="text" name="deleted_at" value="<?php echo ($this->input->post('deleted_at') ? $this->input->post('deleted_at') : $asset['deleted_at']); ?>" class="form-control" id="deleted_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="acquired_at" class="col-md-4 control-label">Acquired At</label>
		<div class="col-md-8">
			<input type="text" name="acquired_at" value="<?php echo ($this->input->post('acquired_at') ? $this->input->post('acquired_at') : $asset['acquired_at']); ?>" class="form-control" id="acquired_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $asset['status']); ?>" class="form-control" id="status" />
			<span class="text-danger"><?php echo form_error('status');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-4 control-label">Description</label>
		<div class="col-md-8">
			<input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $asset['description']); ?>" class="form-control" id="description" />
			<span class="text-danger"><?php echo form_error('description');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>