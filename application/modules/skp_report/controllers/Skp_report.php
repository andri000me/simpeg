<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skp_report extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('skpreport_model');
        $this->id = $this->session->userdata('user_id');
    }
    
    /** just access for operator */
    
    public function index()
    {
        $this->input->post('cari');
        $this->form_validation->set_rules('bln', 'Bulan', 'required|numeric');
        $this->form_validation->set_rules('thn', 'Tahun', 'required|numeric');
        
        if( $this->form_validation->run() === TRUE) {
            $bln = $this->input->post('bln', TRUE);
            $thn = $this->input->post('thn', TRUE);
        }else{
            $bln = date('m');
            $thn = date('Y');
        }
        $start = $thn.'-'.$bln.'-01';
        $end = $thn.'-'.$bln.'-31';
        $where = ['ts.create_at >=' => $start, 'ts.create_at <=' => $end ];
        $skp = $this->skpreport_model->countSKP($where)->result();

        $data = configs('Laporan Tugas');
        $data['skp'] = $skp;
        $data['bln'] = $bln;
        $data['thn'] = $thn;
        $this->template->load('main', 'skp_list', $data);
    }

    public function detail()
    {
        $user_id = $this->uri->segment(3);
        $bln = $this->uri->segment(4);
        $thn = $this->uri->segment(5);

        $start = $thn.'-'.$bln.'-01';
        $end = $thn.'-'.$bln.'-31';
        $where = ['ts.create_at >=' => $start, 'ts.create_at <=' => $end, 'ts.user_id' => $user_id ];
        $skp = $this->skpreport_model->getAll($where)->result();
        $userdata = $this->skpreport_model->getAll($where)->row_array();

        $data = configs('Detail SKP');
        $data['user'] = $userdata;
        $data['skp'] = $skp;
      
        $this->template->load('main', 'skp_detail', $data);
    }
}