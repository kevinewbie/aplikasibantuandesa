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
        <h2 style="margin-top:0px">Tbl_air Read</h2>
        <table class="table">
	    <tr><td>Air</td><td><?php echo $air; ?></td></tr>
	    <tr><td>Bobot</td><td><?php echo $bobot; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('air') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>