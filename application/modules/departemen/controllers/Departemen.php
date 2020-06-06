<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('departemen_model');
    }

    public function index()
    {
        $data = configs('Data departemen');
        $data['data'] = $this->db->get('tb_departemen')->result();
        $this->template->load('main', 'departemen_list', $data);
    }

    public function create( $id_departemen =null)
    {
        $formdata = array();
        if($id_departemen)
        {
            $params = (int)$id_departemen;
            $departemen = $this->departemen_model->getDataById($params);

            if( $departemen->num_rows() > 0 )
            {
                $data = $departemen->row_array();
                $formdata['id_departemen'] = $data['id_departemen'];
                $formdata['departemen_name'] = $data['departemen_name'];
            }else{
                $this->session->set_flashdata('message', 'invalid id not found');
				redirect('departemen');
            }
        }else{
            $formdata['id_departemen'] = "";
            $formdata['departemen_name'] = "";
        }

        $data = configs('Create/Edit Departemen');
		$data['formdata'] = $formdata;
		$this->template->load('main','departemen_form', $data);
    }

    public function saving()
    {
        if( isset($_POST['save']))
        {
            $validation_config = array(
                array(
                    'field' => 'departemen_name',
                    'rules' => 'trim|required',
                    'label' => 'Nama Departemen'
                ),
            );

            $postdata = $this->input->post();
            $this->form_validation->set_rules( $validation_config );
            $this->form_validation->set_message('required', '{field} wajib diisi');

            if( $this->form_validation->run() === FALSE)
            {
                $error['departemen_name'] = form_error('departemen_name');

                $response['status'] = 0;
                $response['error'] = $error;
                $response['message'] = 'Error saving. please try again';
            }else
            {
                if( ! $this->departemen_model->dataDuplicate($postdata['departemen_name'])) {
                    $response['status'] = 0;
                    $response['message'] = 'Data has already on database';                    
                }else{
                    
                    $id_departemen = $this->departemen_model->saveData( $postdata);
                    if( $id_departemen)
                    {
                        $error['departemen_name'] = "";
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
            }
            echo json_encode( $response );
		    exit;
        }
    }

    public function delete()
    {
        $id_departemen = $_POST['id_departemen'];
        $this->departemen_model->destroy($id_departemen);
        $this->departemen_model->destroy_jabatan($id_departemen);
        $this->session->set_flashdata('message2', 'Data has deleted from database!');
		redirect('departemen');
    }
    
}