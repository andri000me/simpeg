<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlevel extends MY_Controller {

    function __construct()
    {
        parent::__construct();
            is_login();
            $this->load->model('userlevel_model');
	}

    public function index()
    {
        $data = configs('Level User');
        $data['role'] =  $this->userlevel_model->get_all('tb_roles')->result();
        $this->template->load('main','userlevel_list', $data);
    }

    public function userlevel_akses($role_id)
    {
        $params = (int)$role_id;
        $roles = $this->userlevel_model->getRole($params);
        if($roles->num_rows() > 0 )
        {
            $data = configs('Beri Akses');
            $data['menu'] = $this->db->get('tb_menu')->result();
            $this->template->load('main','userlevel_akses', $data);
        }else{
            $this->session->set_flashdata('message', 'invalid id not found');
			redirect('userlevel');
        }
    }

    function kasi_akses_ajax(){
        $menu_id        = $_GET['menu_id'];
        $role_id  = $_GET['level'];
        // chek data
        $params = array('menu_id'=>$menu_id,'role_id'=>$role_id);
        $akses = $this->db->get_where('tb_role_permission',$params);
        if($akses->num_rows()<1){
            // insert data baru
            $this->db->insert('tb_role_permission',$params);
        }else{
            $this->db->where('menu_id',$menu_id);
            $this->db->where('role_id',$role_id);
            $this->db->delete('tb_role_permission');
        }
    }

    public function create( $role_id = null)
    {
        $formdata = array();
        if( $role_id )
        {
            $params = (int)$role_id;
            $role = $this->userlevel_model->getRole( $params );

            if ($role->num_rows() > 0 )
            {
                $roledata = $role->row_array();

                $formdata['role_id'] = $roledata['role_id'];
                $formdata['role_name'] = $roledata['role_name'];
                $formdata['description'] = $roledata['description'];
                
            }else{
                $this->session->set_flashdata('message', 'invalid id not found');
				redirect('userlevel');
            }
        }else{
            $formdata['role_id'] = "";
            $formdata['role_name'] = "";
            $formdata['description'] = "";
        }

        $data = configs('Create/Edit Level user');
		$data['formdata'] = $formdata;
		$this->template->load('main','userlevel_form', $data);
        
    }

    public function saving()
    {
        if ( isset ($_POST['save']))
        {
            $validation_config = array(
                array(
                    'field' => 'role_name',
                    'rules' => 'trim|required',
                    'label' => 'Role Name',
                ),
                array(
                    'field' => 'description',
                    'rules' => 'trim|required',
                    'label' => 'Description Role',
                ),
            );

            $postdata = $this->input->post();

            $this->form_validation->set_rules( $validation_config );
            $this->form_validation->set_message('required', '{field} wajib diisi');

            if( $this->form_validation->run() === FALSE)
            {
                $error['role_name'] = form_error('role_name');
                $error['description'] = form_error('description');

                $response['status']  = 0;
                $response['error'] = $error;
                $response['message'] = 'Error saving. please try again!';
            }else{
                $role_id = $this->userlevel_model->saveRole( $postdata );

                if( $role_id )
                {
                    $error['role_name'] = "";
                    $error['description'] = "";

                    $response['status'] = 1;
                    $response['message'] = 'Successfuly! data has saved to database';
                    $response['error'] = $error;
                }else{
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
        $role_id = $_POST['role_id'];
		$this->userlevel_model->destroy($role_id);
        $this->userlevel_model->destroy_permission($role_id);
        $this->session->set_flashdata('message2', 'Data has deleted from database!');
		redirect('userlevel');
    }
}