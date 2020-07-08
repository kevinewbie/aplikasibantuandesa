<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_LISTRIK</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Listrik <?php echo form_error('listrik') ?></td><td><input type="text" class="form-control" name="listrik" id="listrik" placeholder="Listrik" value="<?php echo $listrik; ?>" /></td></tr>
	    <tr><td width='200'>Bobot <?php echo form_error('bobot') ?></td><td><input type="text" class="form-control" name="bobot" id="bobot" placeholder="Bobot" value="<?php echo $bobot; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_listrik" value="<?php echo $id_listrik; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('listrik') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>