<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Location Add</h3>
            </div>
            <?php echo form_open('location/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
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
						<label for="floor" class="control-label">Floor</label>
						<div class="form-group">
							<input type="text" name="floor" value="<?php echo $this->input->post('floor'); ?>" class="form-control" id="floor" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="block" class="control-label">Block</label>
						<div class="form-group">
							<input type="text" name="block" value="<?php echo $this->input->post('block'); ?>" class="form-control" id="block" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sector" class="control-label">Sector</label>
						<div class="form-group">
							<input type="text" name="sector" value="<?php echo $this->input->post('sector'); ?>" class="form-control" id="sector" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="room" class="control-label">Room</label>
						<div class="form-group">
							<input type="text" name="room" value="<?php echo $this->input->post('room'); ?>" class="form-control" id="room" />
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
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fone" class="control-label">Fone</label>
						<div class="form-group">
							<input type="text" name="fone" value="<?php echo $this->input->post('fone'); ?>" class="form-control" id="fone" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="location_type" class="control-label">Location Type</label>
						<div class="form-group">
							<input type="text" name="location_type" value="<?php echo $this->input->post('location_type'); ?>" class="form-control" id="location_type" />
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