<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('menu_model');
    }

    public function index()
    {
        $data = configs('Data departemen');
        $menus = $this->menu_model->get_menu();
        $data['menu'] = $menus->result_array();
        $data['setting'] = $this->db->get_where('tb_setting', array('setting_id' => 1))->row_array();

        $this->template->load('main','menu_list',$data);
    }

    function save_setting()
    {
        $value = $this->input->post('show_menu');
        $this->db->where('setting_id', 1);
        $this->db->update('tb_setting', array('value' => $value));
        echo $this->session->set_flashdata('success', 'Success! data has changes');
        redirect(site_url('menu'));
    }

    public function create( $menuId = null )
    {
        $formdata = array();
        if ( $menuId )
        {
            $params = (int)$menuId;
            $menu = $this->menu_model->getMenu( $params );

            if( $menu->num_rows() > 0 )
            {
                $menudata = $menu->row_array();

                $formdata['menu_id'] = $menudata['menu_id'];
                $formdata['title'] = $menudata['title'];
                $formdata['url'] = $menudata['url'];
                $formdata['icon'] = $menudata['icon'];
                $formdata['is_main_menu'] = $menudata['is_main_menu'];
                $formdata['is_aktif'] = $menudata['is_active'];

            }else
			{
				$this->session->set_flashdata('message', 'invalid id not found');
				redirect('menu');
			}
        }else{
            $formdata['menu_id'] = "";
            $formdata['title'] = "";
            $formdata['url'] = "";
            $formdata['icon'] = "";
            $formdata['is_main_menu'] = "";
            $formdata['is_aktif'] = "";
        }
        
        $data = configs('Create/Edit Menu');
		$data['formdata'] = $formdata;
		$this->template->load('main','menu_form', $data);
    }
    
    public function saving()
    {
        if( isset ($_POST['save']) )
        {
            $validation_config = array(
                array(
                    'field' => 'title',
                    'rules' => 'trim|required',
                    'label' => 'title'
                ),
                
                array(
                    'is_aktif' => 'is_aktif',
                    'rules' => 'trim|required',
                    'label' => 'Status Menu Ditampilkan',
                ),

            );

            $postdata = $this->input->post();
			
			$this->form_validation->set_rules( $validation_config );
            $this->form_validation->set_message('required', '{field} wajib diisi');
            
            if( $this->form_validation->run() === FALSE)
            {
                $error['title'] = form_error('title');
                $error['is_aktif'] = form_error('is_aktif');

                $response['status'] = 0;
                $response['error'] = $error;
                $response['message'] = 'Error saving. please try again';
            }else{
                
                $menu_id = $this->menu_model->saveMenu( $postdata );

                if($menu_id)
                {
                    $error['title'] = "";
                    $error['is_aktif'] = "";

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
		$menu_id = $_POST['menu_id'];
		$this->menu_model->destroy($menu_id);
		$this->menu_model->destroy_akses($menu_id);
		$this->session->set_flashdata('message2', 'Data has deleted from database!');
		redirect('menu');
    }


}