<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_task extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('report_model');
        $this->id = $this->session->userdata('user_id');
    }
    
    
    public function index()
    {
        $data = configs('Laporan Tugas');
        $this->template->load('main', 'report_tugas', $data);
    }
}