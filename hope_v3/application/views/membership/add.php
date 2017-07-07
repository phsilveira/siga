<?php echo form_open('membership/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="first_name" class="col-md-4 control-label">First Name</label>
		<div class="col-md-8">
			<input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" class="form-control" id="first_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="last_name" class="col-md-4 control-label">Last Name</label>
		<div class="col-md-8">
			<input type="text" name="last_name" value="<?php echo $this->input->post('last_name'); ?>" class="form-control" id="last_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="email_addres" class="col-md-4 control-label">Email Addres</label>
		<div class="col-md-8">
			<input type="text" name="email_addres" value="<?php echo $this->input->post('email_addres'); ?>" class="form-control" id="email_addres" />
		</div>
	</div>
	<div class="form-group">
		<label for="user_name" class="col-md-4 control-label">User Name</label>
		<div class="col-md-8">
			<input type="text" name="user_name" value="<?php echo $this->input->post('user_name'); ?>" class="form-control" id="user_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="pass_word" class="col-md-4 control-label">Pass Word</label>
		<div class="col-md-8">
			<input type="text" name="pass_word" value="<?php echo $this->input->post('pass_word'); ?>" class="form-control" id="pass_word" />
		</div>
	</div>
	<div class="form-group">
		<label for="group" class="col-md-4 control-label">Group</label>
		<div class="col-md-8">
			<input type="text" name="group" value="<?php echo $this->input->post('group'); ?>" class="form-control" id="group" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>