<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_TANGGUNGAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Jumlah Tanggungan <?php echo form_error('jumlah_tanggungan') ?></td><td><input type="text" class="form-control" name="jumlah_tanggungan" id="jumlah_tanggungan" placeholder="Jumlah Tanggungan" value="<?php echo $jumlah_tanggungan; ?>" /></td></tr>
	    <tr><td width='200'>Bobot <?php echo form_error('bobot') ?></td><td><input type="text" class="form-control" name="bobot" id="bobot" placeholder="Bobot" value="<?php echo $bobot; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_tanggungan" value="<?php echo $id_tanggungan; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('tanggungan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>