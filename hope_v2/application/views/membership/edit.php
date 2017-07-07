<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Membership Edit</h3>
            </div>
			<?php echo form_open('membership/edit/'.$membership['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="first_name" class="control-label">First Name</label>
						<div class="form-group">
							<input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $membership['first_name']); ?>" class="form-control" id="first_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="last_name" class="control-label">Last Name</label>
						<div class="form-group">
							<input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $membership['last_name']); ?>" class="form-control" id="last_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_addres" class="control-label">Email Addres</label>
						<div class="form-group">
							<input type="text" name="email_addres" value="<?php echo ($this->input->post('email_addres') ? $this->input->post('email_addres') : $membership['email_addres']); ?>" class="form-control" id="email_addres" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="user_name" class="control-label">User Name</label>
						<div class="form-group">
							<input type="text" name="user_name" value="<?php echo ($this->input->post('user_name') ? $this->input->post('user_name') : $membership['user_name']); ?>" class="form-control" id="user_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="pass_word" class="control-label">Pass Word</label>
						<div class="form-group">
							<input type="text" name="pass_word" value="<?php echo ($this->input->post('pass_word') ? $this->input->post('pass_word') : $membership['pass_word']); ?>" class="form-control" id="pass_word" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="group" class="control-label">Group</label>
						<div class="form-group">
							<input type="text" name="group" value="<?php echo ($this->input->post('group') ? $this->input->post('group') : $membership['group']); ?>" class="form-control" id="group" />
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