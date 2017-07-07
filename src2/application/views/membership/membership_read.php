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
        <h2 style="margin-top:0px">Membership Read</h2>
        <table class="table">
	    <tr><td>First Name</td><td><?php echo $first_name; ?></td></tr>
	    <tr><td>Last Name</td><td><?php echo $last_name; ?></td></tr>
	    <tr><td>Email Addres</td><td><?php echo $email_addres; ?></td></tr>
	    <tr><td>User Name</td><td><?php echo $user_name; ?></td></tr>
	    <tr><td>Pass Word</td><td><?php echo $pass_word; ?></td></tr>
	    <tr><td>Group</td><td><?php echo $group; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('membership') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>