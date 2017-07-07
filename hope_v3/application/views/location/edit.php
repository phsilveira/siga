<?php echo form_open('location/edit/'.$location['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="cost_center_id" class="col-md-4 control-label">Cost Center</label>
		<div class="col-md-8">
			<select name="cost_center_id" class="form-control">
				<option value="">select cost_center</option>
				<?php 
				foreach($all_cost_centers as $cost_center)
				{
					$selected = ($cost_center['id'] == $location['cost_center_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$cost_center['id'].'" '.$selected.'>'.$cost_center['name'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="floor" class="col-md-4 control-label">Floor</label>
		<div class="col-md-8">
			<input type="text" name="floor" value="<?php echo ($this->input->post('floor') ? $this->input->post('floor') : $location['floor']); ?>" class="form-control" id="floor" />
		</div>
	</div>
	<div class="form-group">
		<label for="block" class="col-md-4 control-label">Block</label>
		<div class="col-md-8">
			<input type="text" name="block" value="<?php echo ($this->input->post('block') ? $this->input->post('block') : $location['block']); ?>" class="form-control" id="block" />
		</div>
	</div>
	<div class="form-group">
		<label for="sector" class="col-md-4 control-label">Sector</label>
		<div class="col-md-8">
			<input type="text" name="sector" value="<?php echo ($this->input->post('sector') ? $this->input->post('sector') : $location['sector']); ?>" class="form-control" id="sector" />
		</div>
	</div>
	<div class="form-group">
		<label for="room" class="col-md-4 control-label">Room</label>
		<div class="col-md-8">
			<input type="text" name="room" value="<?php echo ($this->input->post('room') ? $this->input->post('room') : $location['room']); ?>" class="form-control" id="room" />
		</div>
	</div>
	<div class="form-group">
		<label for="created_at" class="col-md-4 control-label">Created At</label>
		<div class="col-md-8">
			<input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $location['created_at']); ?>" class="form-control" id="created_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="updated_at" class="col-md-4 control-label">Updated At</label>
		<div class="col-md-8">
			<input type="text" name="updated_at" value="<?php echo ($this->input->post('updated_at') ? $this->input->post('updated_at') : $location['updated_at']); ?>" class="form-control" id="updated_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="deleted_at" class="col-md-4 control-label">Deleted At</label>
		<div class="col-md-8">
			<input type="text" name="deleted_at" value="<?php echo ($this->input->post('deleted_at') ? $this->input->post('deleted_at') : $location['deleted_at']); ?>" class="form-control" id="deleted_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $location['status']); ?>" class="form-control" id="status" />
		</div>
	</div>
	<div class="form-group">
		<label for="fone" class="col-md-4 control-label">Fone</label>
		<div class="col-md-8">
			<input type="text" name="fone" value="<?php echo ($this->input->post('fone') ? $this->input->post('fone') : $location['fone']); ?>" class="form-control" id="fone" />
		</div>
	</div>
	<div class="form-group">
		<label for="location_type" class="col-md-4 control-label">Location Type</label>
		<div class="col-md-8">
			<input type="text" name="location_type" value="<?php echo ($this->input->post('location_type') ? $this->input->post('location_type') : $location['location_type']); ?>" class="form-control" id="location_type" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>