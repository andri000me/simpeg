<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skp extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('skp_model');
        $this->id = $this->session->userdata('user_id');
    }

    public function index()
    {
        $data = configs('Tabel Sasaran Kinerja Pegawai');
        $data['skpdata'] = $this->skp_model->getSkp($this->id);
        $this->template->load('main','skp_list', $data);
    }

    public function create($skp_id = null)
    {
        $formdata = array();
        if($skp_id)
        {
            $params = (int)$skp_id;
            $getskp = $this->skp_model->getSkpById($params);

            if( $getskp->num_rows() > 0)
            {
                $skpdata = $getskp->row_array();
                $formdata['skp_id'] = $skpdata['skp_id'];
                $formdata['kegiatan'] = $skpdata['kegiatan'];
                $formdata['kuantitas'] = $skpdata['kuantitas'];
                $formdata['kualitas'] = $skpdata['kualitas'];
                $formdata['satuan'] = $skpdata['satuan'];
                $formdata['waktu'] = $skpdata['waktu'];
            }else{
                $this->session->set_flashdata('message', 'invalid id not found');
				redirect('skp');
            }
        }else{
            $formdata['skp_id'] = "";
            $formdata['kegiatan'] = "";
            $formdata['kuantitas'] = "";
            $formdata['satuan'] = "";
            $formdata['kualitas'] = "";
            $formdata['waktu'] = "";
        }
        
        $data = configs('Create/Edit data SKP');
        $data['formdata'] = $formdata;
        $this->template->load('main', 'skp_form', $data);
    }

    public function saving()
    {
        if( isset($_POST['save']))
        {
            $validation_config = $this->skp_model->validation_rules();
            $postdata = $this->input->post();
            $this->form_validation->set_rules( $validation_config );
            $this->form_validation->set_message('required', '{field} wajib diisi');

            if( $this->form_validation->run() === FALSE)
            {
                $error['kegiatan'] = form_error('kegiatan');
                $error['kuantitas'] = form_error('kuantitas');
                $error['satuan'] = form_error('satuan');
                $error['kualitas'] = form_error('kualitas');
                $error['waktu'] = form_error('waktu');

                $response['status'] = 0;
                $response['error'] = $error;
                $response['message'] = 'Error saving. please try again';
            }else{
                $skp_id = $this->skp_model->saving( $postdata );
                if( $skp_id )
                {
                    $error['kegiatan'] = "";
                    $error['kuantitas'] = "";
                    $error['satuan'] = "";
                    $error['kualitas'] = "";
                    $error['waktu'] = "";

                    $response['status'] = 1;
                    $response['message'] = 'Successfuly! data has saved to database';
                    $response['error'] = $error;
                }
                else
                {
                    $response['status'] = 0;
                    $response['message'] = 'Failure! data not save';
                }
            }
            echo json_encode( $response );
		    exit;
        }
    }

    public function delete()
    {
        $skp_id = $_POST['skp_id'];
        $this->skp_model->destroy($skp_id);
        $this->session->set_flashdata('message2', 'Data has deleted from database!');
		redirect('skp');
    }
}