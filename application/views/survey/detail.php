<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">DATA WARGA</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr><td width="200">Nama KK</td><td><?php echo $warga['nama_kk'] ?></td></tr>
                            <tr><td>No Kk</td><td><?php echo $warga['no_kk'] ?></td></tr>
							<tr><td>Tanggal Survey</td><td><?php echo $warga['tanggal_survey'] ?></td></tr>
							<tr><td>Nama Petugas</td><td><?php echo $warga['nama_petugas'] ?></td></tr>
							<tr><td>Jumlah Tanggungan</td><td><?php echo $warga['jumlah_tanggungan'] ?></td></tr>
							<tr><td>Penghasilan</td><td><?php echo $warga['penghasilan'] ?></td></tr>
							<tr><td>Luas Rumah</td><td><?php echo $warga['luas_rumah'] ?></td></tr>
							<tr><td>Listrik</td><td><?php echo $warga['listrik'] ?></td></tr>
							<tr><td>Sumber Air</td><td><?php echo $warga['sumber_air'] ?></td></tr>

                        </table>


                        <!-- untuk input Tindakan!>
                        
                        <!-- Button trigger modal -->
                       <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tanggungan">Tanggungan</button>
                            
                        </button>

                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#penghasilan">GAJI</button>
						
						 <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#luas_rumah">Luas Rumah</button>
						
							 <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#listrik">Listrik</button>

						
						
<!------------------------------------------------------------------------------------- Modal TANGGUNGAN--------------------------------------------------------- -->
                        <div id="tanggungan" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
									
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Hitung Tanggungan</h4>
                                    </div>
                                  <?php echo form_open('survey/tanggungan_action'); ?>
                                    <div class="modal-body">
									
                                      <input value="<?php echo $id_survey; ?>" type="hidden" name="id_survey">
                                        <table class="table table-bordered">
										   <tr><td width='200'>Poliklinik </td><td>
                            <?php echo cmb_dinamis('jumlah_tanggungan', 'tbl_tanggungan', 'jumlah_tanggungan', 'jumlah_tanggungan',$tanggungan['jumlah_tanggungan']) ?></td></tr>
                                          
                                          
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div></div></div>
               



 <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">HITUNG TAGGUNGAN</h3>

                    </div>

                    <div class="box-body">
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr><th>NO</th>
							<th>Jumlah Tanggungan</th>
							<th>Bobot</th>
                               
								</tr>
                            <?php
                            $no = 1;
                             $total_bobot = 0;
                            foreach ($riwayat_tanggungan as $r) {
                                echo "<tr>
                                    <td>$no</td>
                                    <td>$r->jumlah_tanggungan</td>
                                
                                    <td>$r->bobot</td></tr>";
                                $no++;
                               $total_bobot = $total_bobot + $r->bobot;
                            }
                            ?>
                           
                        </table>
                    </div>
                </div>
            </div>
		


 <!-- ----------------------------------------------------------------------------MODAL PENGHASILAN----------------------------------------------------------------------------->



<div id="penghasilan" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
									
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Hitung Penghasilan</h4>
                                    </div>
                                  <?php echo form_open('survey/gaji_action'); ?>
                                    <div class="modal-body">
									
                                      <input value="<?php echo $id_survey; ?>" type="hidden" name="id_survey">
                                        <table class="table table-bordered">
										   <tr><td width='200'>Penghasilan </td><td>
                            <?php echo cmb_dinamis('gaji', 'tbl_gaji', 'gaji', 'gaji',$gaji['gaji']) ?></td></tr>
                                          
                                          
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                    </div>
                                </div>
                                </form>

                            </div><div>
                        </div></div>
						
						
						
						
						
						
						
						
               



 <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">HITUNG GAJI</h3>

                    </div>

                    <div class="box-body">
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr><th>NO</th>
							<th>Jumlah Penghasilan</th>
							<th>Bobot</th>
                               
								</tr>
                            <?php
                            $no = 1;
                             $total_gaji = 0;
                            foreach ($riwayat_gaji as $g) {
                                echo "<tr>
                                    <td>$no</td>
                                    <td>$g->gaji</td>
                                
                                    <td>$g->bobot</td></tr>";
                                
                                $total_gaji = $total_gaji + $g->bobot;
                            }
                            ?>
                           
                        </table>
                    </div>
                </div>
            </div>
		
<!------------------------------------------------------------------------------MODAL RUMAH----------------------------------------------------------------------------->



<div id="luas_rumah" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
									
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Hitung Luas Rumah</h4>
                                    </div>
                                  <?php echo form_open('survey/rumah_action'); ?>
                                    <div class="modal-body">
									
                                      <input value="<?php echo $id_survey; ?>" type="hidden" name="id_survey">
                                        <table class="table table-bordered">
										   <tr><td width='200'>Luas Rumah </td><td>
                            <?php echo cmb_dinamis('luas_rumah', 'tbl_rumah', 'luas_rumah', 'luas_rumah',$rumah['luas_rumah']) ?></td></tr>
                                          
                                          
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div></div>
               


 <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">HITUNG LUAS RUMAH</h3>

                    </div>

                    <div class="box-body">
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr><th>NO</th>
							<th>Luas Rumah</th>
							<th>Bobot</th>
                               
								</tr>
                            <?php
                            $no = 1;
                              $total_luas = 0;
                            foreach ($riwayat_rumah as $h) {
                                echo "<tr>
                                    <td>$no</td>
                                    <td>$h->luas_rumah</td>
                                
                                    <td>$h->bobot</td></tr>";
                                $no++;
                                $total_luas = $total_luas + $h->bobot;
                            }
                            ?>
                                                     
                        </table>
                    </div>
                </div>
            </div> 
			
			
<!------------------------------------------------------------------------------MODAL LISTRIK----------------------------------------------------------------------------->
                        <div id="listrik" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Hitung Listrik</h4>
                                    </div>
                                  <?php echo form_open('survey/listrik_action'); ?>
                                    <div class="modal-body">
									
                                      <input value="<?php echo $id_survey; ?>" type="hidden" name="id_survey">
                                        <table class="table table-bordered">
										   <tr><td width='200'>Listrik </td><td>
                            <?php echo cmb_dinamis('listrik', 'tbl_listrik', 'listrik', 'listrik',$listrik['listrik']) ?></td></tr>
                                          
                                          
                                        </table>
                                      
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>

			
			
			
			
			
			
			
			
               


 <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Listrik</h3>

                    </div>

                    <div class="box-body">
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr><th>NO</th>
							<th>Listrik</th>
							<th>Bobot</th>
                               
								</tr>
                            <?php
                            $no = 1;
                             $total_listrik = 0;
                            foreach ($riwayat_listrik as $l) {
                                echo "<tr>
                                    <td>$no</td>
                                    <td>$l->listrik</td>
                                
                                    <td>$l->bobot</td></tr>";
                                $no++;
                                $total_listrik = $total_listrik + $l->bobot;
                            }
                            ?>
                              
                        </table>
                        </table>
                    </div>
                </div>
            </div> 
		

		


 
 
    <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">KALKULASI</h3>

                    </div>

                    <div class="box-body">
                        <table class="table table-bordered" style="margin-bottom: 10px">
                           
                            <?php
							
                            
                            $total_q = $total_gaji + $total_luas + $total_bobot + $total_listrik ;?>
							
							
                           <center><tr><td colspan="0" align="center">  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#total">KLIK UNTUK HASIL</button> <b>
							

 <div id="total" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">KEPUTUSAN</h4>
                                    </div>
                                  <?php echo form_open('survey/keputusan_action'); ?>
                                    <div class="modal-body">
									
                                      <input value="<?php echo $id_survey; ?>" type="hidden" name="id_survey">
                                        <table class="table table-bordered">
										   <tr><td width='200'>BOBOT </td><td><?php echo $total_q; ?></td>
                            <tr><td>KEPUTUSAN</td><td>
							<?php
    $total_q = "$total_q";
    if ($total_q >= "60") {
        echo"BERHAK MENDAPAT BANTUAN";
		
    }
    elseif($total_q < "60"){
        echo"TIDAK BERHAK MENDAPAT BANTUAN";
		
		
    }
	 
	
   
    else{
        echo"tidakada";
    }
	
	
?></td>






</tr>
<tr><td>KEPUTUSAN FINAL </td><td>  <?php echo cmb_dinamis('keputusan', 'tbl_keputusan', 'keputusan', 'keputusan',$keputusan['keputusan']) ?></td></tr></td></tr>
<tr>  <?php echo anchor('survey/cetak_laporan/'.$id_survey,'CETAK LAPORAN PERORANGAN',"class='btn btn-success' target='new'")?> </tr>
                                          
                                          
                                        </table>
                                      
                                    </div>

                                    <div class="modal-footer">
									   <?php
    $total_q = "$total_q";
    if ($total_q >= "60") {
       
		echo  anchor('survey/cetak_kartu/'.$id_survey,'Cetak Kartu Penerima Bantuan',"class='btn btn-info' target='new'");
    }
else{
        echo"";
    }
	?>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>



</b></td></tr>
                        </table>
                    </div>
                </div>
            </div>
 
 
 
 
 
 
 







                    </div>
                </div>
            </div>


         

           
      


        </div>
    </section>
</div>