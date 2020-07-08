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
        <h2 style="margin-top:0px">Tbl_warga Read</h2>
        <table class="table">
	    <tr><td>No Kk</td><td><?php echo $no_kk; ?></td></tr>
	    <tr><td>Nik Warga</td><td><?php echo $nik_warga; ?></td></tr>
	    <tr><td>Nama Kk</td><td><?php echo $nama_kk; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Pekerjaan</td><td><?php echo $pekerjaan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('warga') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>