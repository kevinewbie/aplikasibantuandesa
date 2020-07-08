<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA WARGA</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>No Kk <?php echo form_error('no_kk') ?></td><td><input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk" value="<?php echo $no_kk; ?>" /></td></tr>
	    <tr><td width='200'>Nik Warga <?php echo form_error('nik_warga') ?></td><td><input type="text" class="form-control" name="nik_warga" id="nik_warga" placeholder="Nik Warga" value="<?php echo $nik_warga; ?>" /></td></tr>
	    <tr><td width='200'>Nama Kk <?php echo form_error('nama_kk') ?></td><td><input type="text" class="form-control" name="nama_kk" id="nama_kk" placeholder="Nama Kk" value="<?php echo $nama_kk; ?>" /></td></tr>
	    <tr><td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td><td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td><td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td></tr>
	   <tr><td width='200'>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td><td>
                             <?php echo form_dropdown('jenis_kelamin', array('Laki-laki' => 'LAKI LAKI', 'Perempuan' => 'PEREMPUAN'), $jenis_kelamin, array('class' => 'form-control')); ?>
                            
                            <!--<input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />--></td></tr>
	    
        <tr><td width='200'>Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td></tr>
	    <tr><td width='200'>Agama <?php echo form_error('agama') ?></td><td>
                             <?php echo form_dropdown('agama', array('islam' => 'Islam', 'kristen' => 'Kristen', 'hindu' => 'Hindu', 'budha' => 'Budha'), $agama, array('class' => 'form-control')); ?>
                            
                            <!--<input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />--></td></tr>
	    <tr><td width='200'>Pekerjaan <?php echo form_error('pekerjaan') ?></td><td><input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_warga" value="<?php echo $id_warga; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('warga') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>

