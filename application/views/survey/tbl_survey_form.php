<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA SURVEY</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	   <tr><td width='200'>Nama Kk <?php echo form_error('nama_kk') ?></td><td><input type="text" class="form-control" name="nama_kk" onkeyup="autocomplate_warga()" id="nama_kk" placeholder="Nama Kk" value="<?php echo $nama_kk; ?>" /></td></tr>
	    <tr><td width='200'>No Kk <?php echo form_error('no_kk') ?></td><td><input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk" value="<?php echo $no_kk; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Survey <?php echo form_error('tanggal_survey') ?></td><td><input type="date" class="form-control" name="tanggal_survey" id="tanggal_survey" placeholder="Tanggal Survey" value="<?php echo date('Y-m-d'); ?>" /></td></tr>
	    <tr><td width='200'>Nama Petugas <?php echo form_error('nama_petugas') ?></td><td><input type="text" class="form-control" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas" value="<?php echo $nama_petugas; ?>" /></td></tr>
	    <tr><td width='200'>Jumlah Tanggungan <?php echo form_error('jumlah_tanggungan') ?></td><td><input type="text" class="form-control" name="jumlah_tanggungan" id="jumlah_tanggungan" placeholder="Jumlah Tanggungan" value="<?php echo $jumlah_tanggungan; ?>" /></td></tr>
	    <tr><td width='200'>Penghasilan <?php echo form_error('penghasilan') ?></td><td><input type="text" class="form-control" name="penghasilan" id="penghasilan" placeholder="Penghasilan" value="<?php echo $penghasilan; ?>" /></td></tr>
	    <tr><td width='200'>Luas Rumah <?php echo form_error('luas_rumah') ?></td><td><input type="text" class="form-control" name="luas_rumah" id="luas_rumah" placeholder="Luas Rumah" value="<?php echo $luas_rumah; ?>" /></td></tr>
	    <tr><td width='200'>Listrik <?php echo form_error('listrik') ?></td><td><input type="text" class="form-control" name="listrik" id="listrik" placeholder="Listrik" value="<?php echo $listrik; ?>" /></td></tr>
	    <tr><td width='200'>Status<?php echo form_error('sumber_air') ?></td><td><input type="text" readonly="" class="form-control" name="sumber_air" id="sumber_air" placeholder="Sumber Air" value="Belum Dihitung" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_survey" value="<?php echo $id_survey; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('survey') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>


<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>





<script type="text/javascript">
    
    function autocomplate_warga(){
        //autocomplete
    
        $("#nama_kk").autocomplete({
            source: "<?php echo base_url() ?>index.php/survey/autocomplate_warga",
            minLength: 1
        });
        autoFill();
    }
    
    function autoFill(){
        var nama_kk = $("#nama_kk").val();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/survey/autofill",
            data:"nama_kk="+nama_kk ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#no_kk').val(obj.no_kk);
           
            //$('#alamat').val(obj.alamat);
        });
    }
</script>





<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#nama_petugas").autocomplete({
            source: "<?php echo base_url()?>/index.php/survey/autocomplate_petugas",
            minLength: 1
        });				
    });
</script>





