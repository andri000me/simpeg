<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('tugas_model');
        $this->id = $this->session->userdata('user_id');
    }

    public function index()
    {
        
        $data = configs('Kirim Tugas');
        $data['skpdata'] = $this->tugas_model->getSkpByUser($this->id);
        $this->template->load('main', 'tugas_form', $data);
    }
}