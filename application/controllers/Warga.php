<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_warga_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','warga/tbl_warga_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_warga_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_warga_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_warga' => $row->id_warga,
		'no_kk' => $row->no_kk,
		'nik_warga' => $row->nik_warga,
		'nama_kk' => $row->nama_kk,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'jenis_kelamin' => $row->jenis_kelamin,
		'alamat' => $row->alamat,
		'agama' => $row->agama,
		'pekerjaan' => $row->pekerjaan,
	    );
            $this->template->load('template','warga/tbl_warga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('warga/create_action'),
	    'id_warga' => set_value('id_warga'),
	    'no_kk' => set_value('no_kk'),
	    'nik_warga' => set_value('nik_warga'),
	    'nama_kk' => set_value('nama_kk'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'alamat' => set_value('alamat'),
	    'agama' => set_value('agama'),
	    'pekerjaan' => set_value('pekerjaan'),
	);
        $this->template->load('template','warga/tbl_warga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_kk' => $this->input->post('no_kk',TRUE),
		'nik_warga' => $this->input->post('nik_warga',TRUE),
		'nama_kk' => $this->input->post('nama_kk',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
	    );

            $this->Tbl_warga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('warga'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_warga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('warga/update_action'),
		'id_warga' => set_value('id_warga', $row->id_warga),
		'no_kk' => set_value('no_kk', $row->no_kk),
		'nik_warga' => set_value('nik_warga', $row->nik_warga),
		'nama_kk' => set_value('nama_kk', $row->nama_kk),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'alamat' => set_value('alamat', $row->alamat),
		'agama' => set_value('agama', $row->agama),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
	    );
            $this->template->load('template','warga/tbl_warga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_warga', TRUE));
        } else {
            $data = array(
		'no_kk' => $this->input->post('no_kk',TRUE),
		'nik_warga' => $this->input->post('nik_warga',TRUE),
		'nama_kk' => $this->input->post('nama_kk',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
	    );

            $this->Tbl_warga_model->update($this->input->post('id_warga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('warga'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_warga_model->get_by_id($id);

        if ($row) {
            $this->Tbl_warga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('warga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warga'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('nik_warga', 'nik warga', 'trim|required');
	$this->form_validation->set_rules('nama_kk', 'nama kk', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');

	$this->form_validation->set_rules('id_warga', 'id_warga', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Warga.php */
/* Location: ./application/controllers/Warga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-12 13:38:42 */
/* http://harviacode.com */