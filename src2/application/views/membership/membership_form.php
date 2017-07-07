<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Membership <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">First Name <?php echo form_error('first_name') ?></label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Last Name <?php echo form_error('last_name') ?></label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email Addres <?php echo form_error('email_addres') ?></label>
            <input type="text" class="form-control" name="email_addres" id="email_addres" placeholder="Email Addres" value="<?php echo $email_addres; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Name <?php echo form_error('user_name') ?></label>
            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" value="<?php echo $user_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pass Word <?php echo form_error('pass_word') ?></label>
            <input type="text" class="form-control" name="pass_word" id="pass_word" placeholder="Pass Word" value="<?php echo $pass_word; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Group <?php echo form_error('group') ?></label>
            <input type="text" class="form-control" name="group" id="group" placeholder="Group" value="<?php echo $group; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('membership') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>