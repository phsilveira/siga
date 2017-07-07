<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Assignment History Edit</h3>
            </div>
			<?php echo form_open('assignment_history/edit/'.$assignment_history['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="assignment_id" class="control-label">Assignment</label>
						<div class="form-group">
							<select name="assignment_id" class="form-control">
								<option value="">select assignment</option>
								<?php 
								foreach($all_assignments as $assignment)
								{
									$selected = ($assignment['id'] == $assignment_history['assignment_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$assignment['id'].'" '.$selected.'>'.$assignment['id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="person_id" class="control-label">Membership</label>
						<div class="form-group">
							<select name="person_id" class="form-control">
								<option value="">select membership</option>
								<?php 
								foreach($all_membership as $membership)
								{
									$selected = ($membership['id'] == $assignment_history['person_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$membership['id'].'" '.$selected.'>'.$membership['user_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $assignment_history['status']); ?>" class="form-control" id="status" />
							<span class="text-danger"><?php echo form_error('status');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="created_at" class="control-label">Created At</label>
						<div class="form-group">
							<input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $assignment_history['created_at']); ?>" class="has-datetimepicker form-control" id="created_at" />
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