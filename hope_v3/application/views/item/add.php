<?php echo form_open('item/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="name" class="col-md-4 control-label">Name</label>
		<div class="col-md-8">
			<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-4 control-label">Description</label>
		<div class="col-md-8">
			<input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control" id="description" />
		</div>
	</div>
	<div class="form-group">
		<label for="created_at" class="col-md-4 control-label">Created At</label>
		<div class="col-md-8">
			<input type="text" name="created_at" value="<?php echo $this->input->post('created_at'); ?>" class="form-control" id="created_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="updated_at" class="col-md-4 control-label">Updated At</label>
		<div class="col-md-8">
			<input type="text" name="updated_at" value="<?php echo $this->input->post('updated_at'); ?>" class="form-control" id="updated_at" />
		</div>
	</div>
	<div class="form-group">
		<label for="deleted_at" class="col-md-4 control-label">Deleted At</label>
		<div class="col-md-8">
			<input type="text" name="deleted_at" value="<?php echo $this->input->post('deleted_at'); ?>" class="form-control" id="deleted_at" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>