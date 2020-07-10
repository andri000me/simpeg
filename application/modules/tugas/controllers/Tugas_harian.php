<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_harian extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('tugas_harian_model', 'tugas_model');
        $this->id = $this->session->userdata('user_id');
    }

    public function index()
    {
        $data = configs('Kirim Tugas');
        $this->template->load('main', 'send_task', $data);
    }

}