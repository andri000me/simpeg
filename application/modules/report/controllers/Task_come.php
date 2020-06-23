<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_come extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('task_model');
        $this->id = $this->session->userdata('user_id');
    }
    
    
    public function daily()
    {
        $date = array();
        if(!empty(($_POST['cari'])))
        {
            $postdata = $this->input->post();
            $start = $postdata['start_date'];
            $end = $postdata['end_date'];
            $where = ['tt.tanggal >=' => $start, 'tt.tanggal <=' => $end, 'status' => '0'];
            $get_tugas = $this->task_model->filterTugas($where)->result();
            $date = array('start' => $start, 'end' => $end);
            $tugas = $get_tugas;
        }else{
            $tugas = $this->task_model->getAll()->result();

        }
        
        $data = configs('Laporan Tugas Masuk');
        $data['tugas'] = $tugas;
        $data['date'] = $date;
        $this->template->load('main', 'task_report', $data);
    }

    public function approve()
    {
        
        if(!is_numeric($this->uri->segment(3))) {
            redirect('task_incoming_daily');
        }
        else{
            $this->task_model->approve_task('tb_tugas_tambahan', ['status' => '1'], ['id_tambahan' => $this->uri->segment(3)]);
            $this->session->set_flashdata('message2', 'Berhasil di approve');
            redirect('task_incoming_daily');
        }
    }
}