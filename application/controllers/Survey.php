<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Survey extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_survey_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','survey/tbl_survey_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_survey_model->json();
    }

	
	
	function autocomplate_warga() {
        $this->db->like('nama_kk', $_GET['term']);
        $this->db->select('nama_kk');
        $dataWarga = $this->db->get('tbl_warga')->result();
        foreach ($dataWarga as $warga) {
            $return_arr[] = $warga->nama_kk;
        }

        echo json_encode($return_arr);
    }
	
	  function autofill(){
        $nama_kk = $_GET['nama_kk'];
        $this->db->where('nama_kk',$nama_kk);
        $warga = $this->db->get('tbl_warga')->row_array();
        $data = array(
                   
                    'no_kk'   =>  $warga['no_kk']);
         echo json_encode($data);
    }
	
	
	
	
	function autocomplate_petugas() {
        $this->db->like('nama_petugas', $_GET['term']);
        $this->db->select('nama_petugas');
        $dataPetugas = $this->db->get('tbl_petugas')->result();
        foreach ($dataPetugas as $petugas) {
            $return_arr[] = $petugas->nama_petugas;
        }

        echo json_encode($return_arr);
    }
	

	function detail(){
		$id_survey = substr($this->uri->uri_string(3),14);
		$sql_warga    	= "SELECT  ts.nama_kk,ts.no_kk,ts.tanggal_survey,ts.nama_petugas,ts.jumlah_tanggungan,ts.penghasilan,ts.luas_rumah,ts.listrik,ts.sumber_air
							FROM  tbl_survey as ts, tbl_warga as tw
							WHERE ts.no_kk=tw.no_kk and ts.id_survey='$id_survey'";
							
		$sql_tanggungan    	= "SELECT  tt.jumlah_tanggungan,tt.bobot 
							FROM  tbl_tanggungan as tt, riwayat_tanggungan as tw
							WHERE tt.jumlah_tanggungan=tw.jumlah_tanggungan and tw.id_survey='$id_survey'";
							
		$sql_gaji    	= "SELECT  pd.gaji,pd.bobot 
							FROM  tbl_gaji as pd, riwayat_gaji as ps
							WHERE pd.gaji=ps.gaji and ps.id_survey='$id_survey'";		

							
		$sql_rumah    	= "SELECT  pr.luas_rumah,pr.bobot 
							FROM  tbl_rumah as pr, riwayat_rumah as pk
							WHERE pr.luas_rumah=pk.luas_rumah and pk.id_survey='$id_survey'";		


		$sql_listrik    	= "SELECT  pq.listrik,pq.bobot 
							FROM  tbl_listrik as pq, riwayat_listrik as pl
							WHERE pq.listrik=pl.listrik and pl.id_survey='$id_survey'";				
		$sql_keputusan    	= "SELECT  kp.keputusan
							FROM  tbl_keputusan as kp, keputusan_admin as ka
							WHERE kp.keputusan=ka.keputusan and ka.id_survey='$id_survey'";									
							
							
							
							
		$data['warga']=  $this->db->query($sql_warga)->row_array();
		$data['tanggungan']=  $this->db->query($sql_tanggungan)->row_array();
		$data['gaji']=  $this->db->query($sql_gaji)->row_array();
		$data['listrik']=  $this->db->query($sql_listrik)->row_array();
		$data['rumah']=  $this->db->query($sql_rumah)->row_array();
		$data['keputusan']=  $this->db->query($sql_keputusan)->row_array();
		$data['riwayat_gaji'] = $this->db->query($sql_gaji)->result();
		$data['riwayat_listrik'] = $this->db->query($sql_listrik)->result();
		$data['riwayat_tanggungan'] = $this->db->query($sql_tanggungan)->result();
		$data['riwayat_rumah'] = $this->db->query($sql_rumah)->result();
		$data['keputusan_admin'] = $this->db->query($sql_keputusan)->result();
        $data['id_survey'] = $id_survey;
	  
	  $this->template->load('template','survey/detail',$data);
	
	
	
	
	}
	 

function tanggungan_action(){
	

		
	
        $jumlah_tanggungan    = $this->input->post('jumlah_tanggungan');
      
        $id_survey       	  = $this->input->post('id_survey');
        
        $data = array(
            'jumlah_tanggungan'      =>  $jumlah_tanggungan,
            'id_survey'   =>  $id_survey);
        $this->db->insert('riwayat_tanggungan',$data);
        redirect('survey/detail/'.$id_survey);
}



function gaji_action(){
	

		
	
        $gaji    = $this->input->post('gaji');
      
        $id_survey       	  = $this->input->post('id_survey');
        
        $data = array(
            'gaji'      =>  $gaji,
            'id_survey'   =>  $id_survey);
        $this->db->insert('riwayat_gaji',$data);
        redirect('survey/detail/'.$id_survey);
}




function rumah_action(){
	

		
	
        $luas_rumah    = $this->input->post('luas_rumah');
      
        $id_survey       	  = $this->input->post('id_survey');
        
        $data = array(
            'luas_rumah'      =>  $luas_rumah,
            'id_survey'   =>  $id_survey);
        $this->db->insert('riwayat_rumah',$data);
        redirect('survey/detail/'.$id_survey);
}





function listrik_action(){
	

		
	
        $listrik    = $this->input->post('listrik');
      
        $id_survey       	  = $this->input->post('id_survey');
        
        $data = array(
            'listrik'      =>  $listrik,
            'id_survey'   =>  $id_survey);
        $this->db->insert('riwayat_listrik',$data);
        redirect('survey/detail/'.$id_survey);
}


function keputusan_action(){
	

		
	
        $keputusan    = $this->input->post('keputusan');
      
        $id_survey       	  = $this->input->post('id_survey');
        
        $data = array(
            'keputusan'      =>  $keputusan,
            'id_survey'   =>  $id_survey);
        $this->db->insert('keputusan_admin',$data);
		$this->db->where('id_survey', $id_survey);
		$this->db->update('tbl_survey',array('sumber_air'=>'sudah dihitung'));
        redirect('survey/detail/'.$id_survey);
		
	
		
}









  function cetak_laporan(){
	 $no = 1; 
		$id_survey = substr($this->uri->uri_string(3),21);
	
		
		$sql_warga    	= "SELECT  ts.nama_kk,ts.no_kk,ts.tanggal_survey,ts.nama_petugas,ts.jumlah_tanggungan,ts.penghasilan,ts.luas_rumah,ts.listrik,ts.sumber_air,tw.alamat,tw.pekerjaan
							FROM  tbl_survey as ts, tbl_warga as tw
							WHERE ts.no_kk=tw.no_kk and ts.id_survey='$id_survey'";
        	$sql_keputusan    	= "SELECT  kp.keputusan
							FROM  tbl_keputusan as kp, keputusan_admin as ka
							WHERE kp.keputusan=ka.keputusan and ka.id_survey='$id_survey'";				
      
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 13);
        
      	$pdf->Image('http://localhost/bdesa/assets/foto_profil/logo-desa.png',20,2,30);
        //$pdf->Image($file, $x, $y, $w, $h)
        
        // mencetak string 
         $pdf->Cell(190, 7, 'KANTOR DESA ALANG KEPAYANG', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 6, 'JALAN RAYA PEKANBARU-BANGKINANG', 0, 1, 'C');
        $pdf->Cell(190, 6, '0761-59682', 0, 1, 'C');
        $pdf->Line(20, 33, 210-20, 33); 
        $pdf->Line(20, 34, 210-20, 34);
        $pdf->Cell(8, 8, '',0,1);
        $pdf->Cell(190, 7, 'LAPORAN PERORANGAN', 0, 1, 'C');
		
		
		
		
        
         $pdf->SetFont('Arial', '', 11);
        // data pasien
        
         $warga = $this->db->query($sql_warga)->row_array();
        
         $pdf->Cell(30, 6, 'Nomor KK', 0, 0, 'l');
         $pdf->Cell(70, 6, ': '.$warga['no_kk'], 0, 0, 'l');
         
         $pdf->Cell(40, 6, 'ALAMAT', 0, 0, 'l');
         $pdf->Cell(30, 6, ': '.$warga['alamat'], 0, 1, 'l');
        
         
         $pdf->Cell(30, 6, 	'Nama KK', 0, 0, 'l');
         $pdf->Cell(70, 6, ': '.$warga['nama_kk'], 0, 0, 'l');
		 
         
         $pdf->Cell(40, 6, 'Pekerjaan', 0, 0, 'l');
         $pdf->Cell(30, 6, ': '.$warga['pekerjaan'], 0, 1, 'l');
         
         
         
         // tabel hasil pemeriksaan
		 

         $pdf->Cell(10, 7, 'No', 1, 0, '');
        $pdf->Cell(40, 7, 'Jumlah Tanggungan', 1, 0, 'l');
		 $pdf->Cell(40, 7, 'Penghasilan', 1, 0, 'l');
        $pdf->Cell(55, 7, 'Luas Rumah', 1, 0, 'l');
        $pdf->Cell(40, 7, 'Listrik', 1, 1, 'l');
		
		$tindakan = $this->db->query($sql_warga)->result();
		$total_bobot = 0;
         foreach ($tindakan as $t){
		$pdf->Cell(10, 7,  $no, 1, 0, '');
        $pdf->Cell(40, 7, $t->jumlah_tanggungan, 1, 0, 'C');
		 $pdf->Cell(40, 7, $t->penghasilan, 1, 0, 'l');
        $pdf->Cell(55, 7, $t->luas_rumah, 1, 0, 'l');
        $pdf->Cell(40, 7, $t->listrik, 1, 1, 'l');
		 
        	  	$no++;
	   
	   		
		 }
		 
		 $berhak = $this->db->query($sql_keputusan)->result();
		  foreach ($berhak as $l){
	   $pdf->Cell(180, 30,  $l->keputusan       , 0, 1, 'C');
	   
       
		  }
        
         
         

         
         
         $pdf->Cell(120,5,'',0,0);
         $pdf->Cell(10,1,'',0,1);
         $pdf->Cell(120,1,'',0,0);
         $pdf->Cell(50,5,'Tanggal  : '.date('d/m/Y'),0,1,'C');
         $pdf->Cell(120,5,'',0,0);
         $pdf->Cell(50,5,'Petugas Admin',0,1,'C');
         
         $pdf->Cell(1,7,'',0,1);
         
         $pdf->Cell(120,5,'',0,0);
         $pdf->Cell(50,5,'Kevin',0,1,'C');
        
        $pdf->Output();
    }
	

	
	
	
		
	  function cetak_daftar(){
		$no = 1;     
   
		
		$sql_warga    	= "SELECT  ts.nama_kk,ts.no_kk,ts.tanggal_survey,ts.nama_petugas,ts.jumlah_tanggungan,ts.penghasilan,ts.luas_rumah,ts.listrik,ts.sumber_air, LEFT (keputusan,6) as kp
							FROM  tbl_survey as ts, tbl_warga as tw, keputusan_admin as kp
							WHERE ts.no_kk=tw.no_kk and kp.id_survey=ts.id_survey
                            ";
        	$sql_keputusan    	= "SELECT  kp.keputusan
							FROM  tbl_keputusan as kp, keputusan_admin as ka
							WHERE kp.keputusan=ka.keputusan";				
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 13);
        
         	$pdf->Image('http://localhost/bdesa/assets/foto_profil/logo-desa.png',20,2,30);
        //$pdf->Image($file, $x, $y, $w, $h)
        
        // mencetak string 
         $pdf->Cell(190, 7, 'KANTOR DESA ALANG KEPAYANG', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 6, 'JALAN RAYA PEKANBARU-BANGKINANG', 0, 1, 'C');
        $pdf->Cell(190, 6, '0761-59682', 0, 1, 'C');
        $pdf->Line(20, 33, 210-20, 33); 
        $pdf->Line(20, 34, 210-20, 34);
        $pdf->Cell(8, 8, '',0,1);
        $pdf->Cell(190, 7, 'LAPORAN WARGA DESA ALANG KEPAYANG', 0, 1, 'C');
        
         $pdf->SetFont('Arial', '', 11);
        // data pasien
        
         $warga = $this->db->query($sql_warga)->row_array();
        
         
         
         
         // tabel hasil pemeriksaan
		 

         $pdf->Cell(10, 7, 'No', 1, 0,5, '');
        $pdf->Cell(30, 7, 'NAMA KK', 1, 0, 'C');
		 $pdf->Cell(35, 7, 'No KK', 1, 0, 'C');
		 $pdf->Cell(10, 7, 'TG', 1, 0, 'C');
      	 $pdf->Cell(25, 7, 'Gaji', 1, 0, 'C');
		  $pdf->Cell(25, 7, 'Luas Rumah', 1, 0, 'C');
        	  $pdf->Cell(25, 7, 'Listrik', 1, 0, 'C');
			  	  $pdf->Cell(30, 7, 'Keputusan', 1, 1, 'C');
				  
				  
				  
				  $daftar = $this->db->query($sql_warga)->result();
				  foreach ($daftar as $l){
		$pdf->Cell(10, 7, $no, 1, 0,5, '');
        $pdf->Cell(30, 7, $l->nama_kk, 1, 0, 'C');
		 $pdf->Cell(35, 7, $l->no_kk, 1, 0, 'C');
		 $pdf->Cell(10, 7, $l->jumlah_tanggungan, 1, 0, 'C');
      	 $pdf->Cell(25, 7, $l->penghasilan, 1, 0, 'C');
		  $pdf->Cell(25, 7, $l->luas_rumah, 1, 0, 'C');
          $pdf->Cell(25, 7,$l->listrik, 1, 0, 'C');
			$pdf->Cell(30, 7, $l->kp, 1, 1, 'C');
			$no++;   		
				  }
		  
		  
		  		
		  
		  
		  
		 /* $daftar = $this->db->query($sql_warga)->result();
	
         foreach ($daftar as $l){
		 $pdf->Cell(10, 7, $no, 1, 0,5, '');
        $pdf->Cell(10, 7, $l->nama_kk, 1, 0, 'C');
		 $pdf->Cell(35, 7, $l->no_kk, 1, 0, 'C');
		 
        	$no++;   		
		 } */
		 
		 
		
	   
	 
         
         $pdf->Cell(120,5,'',0,0);
         $pdf->Cell(10,1,'',0,1);
         $pdf->Cell(120,1,'',0,0);
         $pdf->Cell(50,5,'Tanggal  : '.date('d/m/Y'),0,1,'C');
         $pdf->Cell(120,5,'',0,0);
         $pdf->Cell(50,5,'Petugas Admin',0,1,'C');
         
         $pdf->Cell(1,7,'',0,1);
         
         $pdf->Cell(120,5,'',0,0);
         $pdf->Cell(50,5,'Kevin Admansyah',0,1,'C');
        
        $pdf->Output();
    }


function cetak_kartu (){
		  $id_survey = substr($this->uri->uri_string(3),19);
		
		
		  
		  
		  
		  
		$sql_warga    	= "SELECT  ts.nama_kk,ts.no_kk,ts.tanggal_survey,ts.nama_petugas,ts.jumlah_tanggungan,ts.penghasilan,ts.luas_rumah,ts.listrik,ts.sumber_air, LEFT (keputusan,6) as kp, tw.nik_warga, tw.pekerjaan, tw.alamat
							FROM  tbl_survey as ts, tbl_warga as tw, keputusan_admin as kp
							WHERE ts.no_kk=tw.no_kk and kp.id_survey=ts.id_survey and ts.id_survey='$id_survey'                    ";
        	$sql_keputusan    	= "SELECT  kp.keputusan
							FROM  tbl_keputusan as kp, keputusan_admin as ka
							WHERE kp.keputusan=ka.keputusan";				
		
		 
		
		$this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        
		
		
		$pdf->Image('http://localhost/bdesa/assets/latar-kartu.jpg',5,5,100,56);
$pdf->Image('http://localhost/bdesa/assets/latar-kartu.jpg',106,5,100,56);

$pdf->Image('http://localhost/bdesa/assets/foto_profil/logo-desa.png',80,29,20,25);
		
		
		$pdf->Cell(90,5,'DESA ALANG KEPAYANG',0,0,'C');
        $pdf->Cell(10,5,'',0,0,'C');
		

$pdf->setFont('Arial','B',10);
$pdf->Cell(90,5,'KETENTUAN',0,1,'C');
$pdf->setFont('Arial','B',8);
$pdf->Cell(90,5,'Jl.PEKANBARU-BANGKINANG, Telp 0761-59682',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','',7);
$pdf->Cell(90,5,'Kartu dipeegang oleh Kepala Keluarga 1',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->Line(10,20,100,20);
$pdf->setFont('Arial','B',10);
$pdf->Cell(90,5,'KARTU PENERIMA BANTUAN',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','',7);
$pdf->Cell(90,5,'Harap membawa kartu saat menerima bantuan 2',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->Line(10,25,100,25);
$pdf->Ln(6);


 $warga = $this->db->query($sql_warga)->row_array();

$pdf->setFont('Arial','',9);
$pdf->Cell(22,4,'ID Pasien',0,0,'L');
$pdf->Cell(36,4,': '.$warga['no_kk'],0,0,'L');
$pdf->Cell(10,4,'',0,1,'C');
$pdf->setFont('Arial','',10);
$pdf->Cell(22,4,'Nama Pasien',0,0,'L');
$pdf->Cell(36,4,': '.$warga['nama_kk'],0,1,'L');
$pdf->Cell(22,4,'NIK KK',0,0,'L');
$pdf->Cell(36,4,': '.$warga['nik_warga'],0,1,'L');
$pdf->Cell(22,4,'Nama KK',0,0,'L');
$pdf->Cell(36,4,': '.$warga['pekerjaan'],0,1,'L');
$pdf->Cell(22,4,'Alamat',0,0,'L');
$pdf->Cell(36,4,': '.$warga['alamat'],0,1,'L');
$pdf->Ln(2);
        $pdf->Output();
	}



	

	
	
	
    public function read() 
    {
		  $this->template->load('template','survey/tbl_survey_list');
        //$this->template->load('template','pendaftaran/detail');
        

		
		
		
        $row = $this->Tbl_survey_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_survey' => $row->id_survey,
		'nama_kk' => $row->nama_kk,
		'no_kk' => $row->no_kk,
		'tanggal_survey' => $row->tanggal_survey,
		'nama_petugas' => $row->nama_petugas,
		'jumlah_tanggungan' => $row->jumlah_tanggungan,
		'penghasilan' => $row->penghasilan,
		'luas_rumah' => $row->luas_rumah,
		'listrik' => $row->listrik,
		'sumber_air' => $row->sumber_air,
	    );
            $this->template->load('template','survey/tbl_survey_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('survey/create_action'),
	    'id_survey' => set_value('id_survey'),
	    'nama_kk' => set_value('nama_kk'),
	    'no_kk' => set_value('no_kk'),
	    'tanggal_survey' => set_value('tanggal_survey'),
	    'nama_petugas' => set_value('nama_petugas'),
	    'jumlah_tanggungan' => set_value('jumlah_tanggungan'),
	    'penghasilan' => set_value('penghasilan'),
	    'luas_rumah' => set_value('luas_rumah'),
	    'listrik' => set_value('listrik'),
	    'sumber_air' => set_value('sumber_air'),
	);
        $this->template->load('template','survey/tbl_survey_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kk' => $this->input->post('nama_kk',TRUE),
		'no_kk' => $this->input->post('no_kk',TRUE),
		'tanggal_survey' => $this->input->post('tanggal_survey',TRUE),
		'nama_petugas' => $this->input->post('nama_petugas',TRUE),
		'jumlah_tanggungan' => $this->input->post('jumlah_tanggungan',TRUE),
		'penghasilan' => $this->input->post('penghasilan',TRUE),
		'luas_rumah' => $this->input->post('luas_rumah',TRUE),
		'listrik' => $this->input->post('listrik',TRUE),
		'sumber_air' => $this->input->post('sumber_air',TRUE),
	    );

            $this->Tbl_survey_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('survey'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_survey_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('survey/update_action'),
		'id_survey' => set_value('id_survey', $row->id_survey),
		'nama_kk' => set_value('nama_kk', $row->nama_kk),
		'no_kk' => set_value('no_kk', $row->no_kk),
		'tanggal_survey' => set_value('tanggal_survey', $row->tanggal_survey),
		'nama_petugas' => set_value('nama_petugas', $row->nama_petugas),
		'jumlah_tanggungan' => set_value('jumlah_tanggungan', $row->jumlah_tanggungan),
		'penghasilan' => set_value('penghasilan', $row->penghasilan),
		'luas_rumah' => set_value('luas_rumah', $row->luas_rumah),
		'listrik' => set_value('listrik', $row->listrik),
		'sumber_air' => set_value('sumber_air', $row->sumber_air),
	    );
            $this->template->load('template','survey/tbl_survey_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_survey', TRUE));
        } else {
            $data = array(
		'nama_kk' => $this->input->post('nama_kk',TRUE),
		'no_kk' => $this->input->post('no_kk',TRUE),
		'tanggal_survey' => $this->input->post('tanggal_survey',TRUE),
		'nama_petugas' => $this->input->post('nama_petugas',TRUE),
		'jumlah_tanggungan' => $this->input->post('jumlah_tanggungan',TRUE),
		'penghasilan' => $this->input->post('penghasilan',TRUE),
		'luas_rumah' => $this->input->post('luas_rumah',TRUE),
		'listrik' => $this->input->post('listrik',TRUE),
		'sumber_air' => $this->input->post('sumber_air',TRUE),
	    );

            $this->Tbl_survey_model->update($this->input->post('id_survey', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('survey'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_survey_model->get_by_id($id);

        if ($row) {
            $this->Tbl_survey_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('survey'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kk', 'nama kk', 'trim|required');
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('tanggal_survey', 'tanggal survey', 'trim|required');
	$this->form_validation->set_rules('nama_petugas', 'nama petugas', 'trim|required');
	$this->form_validation->set_rules('jumlah_tanggungan', 'jumlah tanggungan', 'trim|required');
	$this->form_validation->set_rules('penghasilan', 'penghasilan', 'trim|required');
	$this->form_validation->set_rules('luas_rumah', 'luas rumah', 'trim|required');
	$this->form_validation->set_rules('listrik', 'listrik', 'trim|required');
	$this->form_validation->set_rules('sumber_air', 'sumber air', 'trim|required');

	$this->form_validation->set_rules('id_survey', 'id_survey', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
   function cetak_laporan(){
		$no = 1;
	$id_survey = substr($this->uri->uri_string(3),14);
        $sql_warga    	= "SELECT  ts.nama_kk,ts.no_kk,ts.tanggal_survey,ts.nama_petugas,ts.jumlah_tanggungan,ts.penghasilan,ts.luas_rumah,ts.listrik,ts.sumber_air
							FROM  tbl_survey as ts, tbl_warga as tw
							WHERE ts.no_kk=tw.no_kk and ts.id_survey='$id_survey'";
							
    
              
      
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 13);
        
      
        //$pdf->Image($file, $x, $y, $w, $h)
        
        // mencetak string 
        $pdf->Cell(190, 7, 'DESA ALANG KEPAYANG', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 6, 'JALAN PKU-BANGKINANG', 0, 1, 'C');
        $pdf->Cell(190, 6, '08812991212', 0, 1, 'C');
        $pdf->Line(20, 33, 210-20, 33); 
        $pdf->Line(20, 34, 210-20, 34);
        $pdf->Cell(8, 8, '',0,1);
        $pdf->Cell(190, 7, 'LAPORAN KEUANGAN', 0, 1, 'C');
        
         $pdf->SetFont('Arial', '', 11);
        // data pasien
        
         $warga = $this->db->query($sql_warga)->row_array();
        
          $pdf->Cell(30, 6, 'NO RM', 0, 0, 'l');
         $pdf->Cell(70, 6, ': '.$warga['no_kk'], 0, 0, 'l');
         
         
         
         // tabel hasil pemeriksaan
		 

         $pdf->Cell(10, 7, 'No', 1, 0,5, '');
        $pdf->Cell(10, 7, 'Id', 1, 0, 'C');
		 $pdf->Cell(35, 7, 'Nama Pasien', 1, 0, 'C');
		 $pdf->Cell(10, 7, 'JK', 1, 0, 'c');
        $pdf->Cell(35, 7, 'Dokter', 1, 0, 'C');
		 $pdf->Cell(30, 7, 'Kamar', 1, 0, 'C');
		  $pdf->Cell(30, 7, 'Tgl Masuk', 1, 0, 'C');
		   $pdf->Cell(30, 7, 'total biaya', 1, 1, 'C');
		  
		  $laporan = $this->db->query($sql_warga)->result();
	
         foreach ($laporan as $l){
		 $pdf->Cell(10, 7, $no, 1, 0,5, '');
        $pdf->Cell(10, 7, $l->nama_kk, 1, 0, 'C');
		 $pdf->Cell(35, 7, $l->no_kk, 1, 0, 'C');
		
		  $pdf->Cell(30, 7, '1.720.000', 1, 1, 'C');
        	$no++;   		
		 }
		 
		 
		
	   
	 
         
         $pdf->Cell(120,5,'',0,0);
         $pdf->Cell(10,1,'',0,1);
         $pdf->Cell(120,1,'',0,0);
         $pdf->Cell(50,5,'Tanggal  : '.date('d/m/Y'),0,1,'C');
         $pdf->Cell(120,5,'',0,0);
         $pdf->Cell(50,5,'Petugas Admin',0,1,'C');
         
         $pdf->Cell(1,7,'',0,1);
         
         $pdf->Cell(120,5,'',0,0);
         $pdf->Cell(50,5,'Kevin Admansyah',0,1,'C');
        
        $pdf->Output();
    }



