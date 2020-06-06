<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('jabatan_model');
    }

    public function index()
    {
        $data = configs('Data Jabatan');
        $data['jabatan'] = $this->jabatan_model->getAllJabatan();
        $this->template->load('main','jabatan_list',$data);
    }

    public function create($id_jabatan = null)
    {
        $formdata = array();
        if( $id_jabatan )
        {
            $params = (int)$id_jabatan;
            $jabatan = $this->jabatan_model->getJabatanById($params);

            if ($jabatan->num_rows() > 0 )
            {
                $jabatans = $jabatan->row_array();
                $formdata['id_jabatan'] = $jabatans['id_jabatan'];
                $formdata['jabatan_name'] = $jabatans['jabatan_name'];
                $formdata['id_departemen'] = $jabatans['id_departemen'];
            }else{
                $this->session->set_flashdata('message', 'invalid id not found');
				redirect('jabatan');
            }
        }else{
            $formdata['id_jabatan'] = "";
            $formdata['jabatan_name'] = "";
            $formdata['id_departemen'] = "";
        }
        
        $data = configs('Create/edit jabatan');
		$data['formdata'] = $formdata;
		$this->template->load('main','jabatan_form', $data);
    }

    public function saving()
    {
        if( isset($_POST['save']))
        {
            $validation_config = array(
                array(
                    'field' => 'jabatan_name',
                    'rules' => 'trim|required',
                    'label' => 'Nama Jabatan'
                ),
            );

            $postdata = $this->input->post();
            $this->form_validation->set_rules( $validation_config );
            $this->form_validation->set_message('required', '{field} wajib diisi');

            if( $this->form_validation->run() === FALSE)
            {
                $error['jabatan_name'] = form_error('jabatan_name');

                $response['status'] = 0;
                $response['error'] = $error;
                $response['message'] = 'Error saving. please try again';
            }
            else{
                $id_jabatan = $this->jabatan_model->saveJabatan( $postdata);
                if( $id_jabatan)
                {
                    $error['jabatan_name'] = "";
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
        $id_jabatan = $_POST['id_jabatan'];
		$this->jabatan_model->destroy($id_jabatan);
        $this->session->set_flashdata('message2', 'Data has deleted from database!');
		redirect('jabatan');
    }

}