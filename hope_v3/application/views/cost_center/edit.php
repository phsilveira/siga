<?php echo form_open('cost_center/edit/'.$cost_center['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="created_at" class="col-md-4 control-label">Created At</label>
		<div class="col-md-8">
			<input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $cost_center['created_at']); ?>" class="form-control" id="created_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="updated_at" class="col-md-4 control-label">Updated At</label>
		<div class="col-md-8">
			<input type="text" name="updated_at" value="<?php echo ($this->input->post('updated_at') ? $this->input->post('updated_at') : $cost_center['updated_at']); ?>" class="form-control" id="updated_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="deleted_at" class="col-md-4 control-label">Deleted At</label>
		<div class="col-md-8">
			<input type="text" name="deleted_at" value="<?php echo ($this->input->post('deleted_at') ? $this->input->post('deleted_at') : $cost_center['deleted_at']); ?>" class="form-control" id="deleted_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $cost_center['status']); ?>" class="form-control" id="status" />
		</div>
	</div>
	<div class="form-group">
		<label for="name" class="col-md-4 control-label">Name</label>
		<div class="col-md-8">
			<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $cost_center['name']); ?>" class="form-control" id="name" />
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-4 control-label">Description</label>
		<div class="col-md-8">
			<input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $cost_center['description']); ?>" class="form-control" id="description" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>