<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Assignment Edit</h3>
            </div>
			<?php echo form_open('assignment/edit/'.$assignment['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="asset_id" class="control-label">Asset</label>
						<div class="form-group">
							<select name="asset_id" class="form-control">
								<option value="">select asset</option>
								<?php 
								foreach($all_assets as $asset)
								{
									$selected = ($asset['id'] == $assignment['asset_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$asset['id'].'" '.$selected.'>'.$asset['asset_tag'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="created_by_person_id" class="control-label">Membership</label>
						<div class="form-group">
							<select name="created_by_person_id" class="form-control">
								<option value="">select membership</option>
								<?php 
								foreach($all_membership as $membership)
								{
									$selected = ($membership['id'] == $assignment['created_by_person_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$membership['id'].'" '.$selected.'>'.$membership['user_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="assignmented_for_person_id" class="control-label">Membership</label>
						<div class="form-group">
							<select name="assignmented_for_person_id" class="form-control">
								<option value="">select membership</option>
								<?php 
								foreach($all_membership as $membership)
								{
									$selected = ($membership['id'] == $assignment['assignmented_for_person_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$membership['id'].'" '.$selected.'>'.$membership['user_name'].'</option>';
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
									$selected = ($cost_center['id'] == $assignment['cost_center_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$cost_center['id'].'" '.$selected.'>'.$cost_center['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status_id" class="control-label">Assignment Statu</label>
						<div class="form-group">
							<select name="status_id" class="form-control">
								<option value="">select assignment_statu</option>
								<?php 
								foreach($all_assignment_status as $assignment_statu)
								{
									$selected = ($assignment_statu['id'] == $assignment['status_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$assignment_statu['id'].'" '.$selected.'>'.$assignment_statu['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="origin_location_id" class="control-label">Location</label>
						<div class="form-group">
							<select name="origin_location_id" class="form-control">
								<option value="">select location</option>
								<?php 
								foreach($all_locations as $location)
								{
									$selected = ($location['id'] == $assignment['origin_location_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$location['id'].'" '.$selected.'>'.$location['id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="destiny_location_id" class="control-label">Location</label>
						<div class="form-group">
							<select name="destiny_location_id" class="form-control">
								<option value="">select location</option>
								<?php 
								foreach($all_locations as $location)
								{
									$selected = ($location['id'] == $assignment['destiny_location_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$location['id'].'" '.$selected.'>'.$location['id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="reason_id" class="control-label">Reason</label>
						<div class="form-group">
							<select name="reason_id" class="form-control">
								<option value="">select reason</option>
								<?php 
								foreach($all_reasons as $reason)
								{
									$selected = ($reason['id'] == $assignment['reason_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$reason['id'].'" '.$selected.'>'.$reason['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="item_id" class="control-label">Item</label>
						<div class="form-group">
							<select name="item_id" class="form-control">
								<option value="">select item</option>
								<?php 
								foreach($all_items as $item)
								{
									$selected = ($item['id'] == $assignment['item_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$item['id'].'" '.$selected.'>'.$item['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $assignment['status']); ?>" class="form-control" id="status" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="created_at" class="control-label">Created At</label>
						<div class="form-group">
							<input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $assignment['created_at']); ?>" class="has-datetimepicker form-control" id="created_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="updated_at" class="control-label">Updated At</label>
						<div class="form-group">
							<input type="text" name="updated_at" value="<?php echo ($this->input->post('updated_at') ? $this->input->post('updated_at') : $assignment['updated_at']); ?>" class="has-datetimepicker form-control" id="updated_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="deleted_at" class="control-label">Deleted At</label>
						<div class="form-group">
							<input type="text" name="deleted_at" value="<?php echo ($this->input->post('deleted_at') ? $this->input->post('deleted_at') : $assignment['deleted_at']); ?>" class="has-datetimepicker form-control" id="deleted_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="start_at" class="control-label">Start At</label>
						<div class="form-group">
							<input type="text" name="start_at" value="<?php echo ($this->input->post('start_at') ? $this->input->post('start_at') : $assignment['start_at']); ?>" class="has-datetimepicker form-control" id="start_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="end_at" class="control-label">End At</label>
						<div class="form-group">
							<input type="text" name="end_at" value="<?php echo ($this->input->post('end_at') ? $this->input->post('end_at') : $assignment['end_at']); ?>" class="has-datetimepicker form-control" id="end_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="answer_at" class="control-label">Answer At</label>
						<div class="form-group">
							<input type="text" name="answer_at" value="<?php echo ($this->input->post('answer_at') ? $this->input->post('answer_at') : $assignment['answer_at']); ?>" class="has-datetimepicker form-control" id="answer_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="scheduled_at" class="control-label">Scheduled At</label>
						<div class="form-group">
							<input type="text" name="scheduled_at" value="<?php echo ($this->input->post('scheduled_at') ? $this->input->post('scheduled_at') : $assignment['scheduled_at']); ?>" class="has-datetimepicker form-control" id="scheduled_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="comments" class="control-label">Comments</label>
						<div class="form-group">
							<input type="text" name="comments" value="<?php echo ($this->input->post('comments') ? $this->input->post('comments') : $assignment['comments']); ?>" class="form-control" id="comments" />
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