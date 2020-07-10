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
        
        $data = configs('Input Tugas');
        $data['skpdata'] = $this->tugas_model->getSkpByUser($this->id);
        $this->template->load('main', 'tugas_form', $data);
    }

    public function cari()
    {
        $skp_id=$_GET['skp_id'];
        $cari =$this->tugas_model->cari($skp_id)->result();
        echo json_encode($cari);
    }

    public function saveTugas()
    {
        if(isset($_POST['saveTugas']))
        {
            $validation = $this->tugas_model->validation_rules_skp();
            $this->form_validation->set_rules($validation);
            if( $this->form_validation->run() === FALSE) {
                $error_message = validation_errors();
                $this->form_validation->set_message($error_message, '{field} wajib diisi');
                $this->index();
            }else{
                $postdata = $this->input->post();

                $saved['skp_id'] = $postdata['skp_id'];
                $saved['user_id'] = $this->id;
                $saved['tanggal'] = $postdata['tanggal'];
                $saved['waktu_mulai'] = $postdata['start_time'];
                $saved['waktu_selesai'] = $postdata['end_time'];
                $saved['output'] = $postdata['output'];
                $saved['create_at'] = date('Y-m-d H:i:s');

                if( !empty($_FILES['files']['tmp_name'])){
                    $folder = formatFolderUser($this->user_id);
                    $destination = FCPATH . 'assets/media/' .$folder. '/file_task/';

                    if(!is_dir($destination)) {
                        mkdir($destination, 0777, TRUE);
                    }

                    $config['file_name']        = "Tugas_jabatan_file-".$_FILES['files']['name'];
                    $config['upload_path']      = $destination;
                    $config['allowed_types']    = 'docx|doc|xls|ppt|jpg|jpeg|png';
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('files'))
                    {
                        $uploaded = $this->upload->data();
                        $saved['file'] = $uploaded['file_name'];
                    }

                }else{
                    $saved['file'] = 'no-file';
                }

                if( $this->tugas_model->insertTugas($saved) ){
                    $this->session->set_flashdata('message2', 'Tugas berhasil tersimpan');
				    redirect('tugas');
                }else{
                    $this->session->set_flashdata('message', 'Error, please try again');
				    redirect('tugas');
                }
            }
        }
    }

    public function tugas_tambahan()
    {
        $data = configs('Input Tugas');
        $this->template->load('main', 'tugas_tambahan_form', $data);
    }

    public function saveTugasHarian()
    {
        if( isset($_POST['saveTugasTambahan']))
        {
            $validation = $this->tugas_model->validation_rules_tambahan();
            $this->form_validation->set_rules($validation);
            if( $this->form_validation->run() === FALSE) {
                $error_message = validation_errors();
                $this->form_validation->set_message($error_message, '{field} wajib diisi');
                $this->tugas_tambahan()();
            }

            $postdata = $this->input->post();
            $saved['user_id'] = $this->id;
            $saved['kegiatan'] = $postdata['kegiatan'];
            $saved['waktu_mulai'] = $postdata['start_time'];
            $saved['waktu_selesai'] = $postdata['end_time'];
            $saved['pemberi_tugas'] = $postdata['pemberi_tugas'];
            $saved['tanggal'] = $postdata['tanggal'];
            $saved['output'] = $postdata['output'];
            $saved['satuan'] = $postdata['satuan'];
            $saved['create_at'] = date('Y-m-d H:i:s');

            if(!empty($_FILES['files']['tmp_name'])) {
                $folder = formatFolderUser($this->user_id);
                $destination = FCPATH . 'assets/media/' .$folder. '/file_task/';

                if(!is_dir($destination)) {
                    mkdir($destination, 0777, TRUE);
                }

                $config['file_name']        = "Tugas_tambahan-".$_FILES['files']['name'];
                $config['upload_path']      = $destination;
                $config['allowed_types']    = 'docx|doc|xls|ppt|jpg|jpeg|png';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('files'))
                {
                    $uploaded = $this->upload->data();
                    $saved['file'] = $uploaded['file_name'];
                }                
            }else{
                $saved['file'] = 'no-file';
            }

            if( $this->tugas_model->insertTambahan($saved)){
                $this->session->set_flashdata('message2', 'Tugas berhasil tersimpan');
				redirect('tugas/tugas_tambahan');
            }else{
                $this->session->set_flashdata('message', 'Error, please try again');
				redirect('tugas/tugas_tambahan');
            }
        }
    }
}