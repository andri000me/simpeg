<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
        $this->load->helper('date');
		$this->load->model(array('users_model','jabatan/jabatan_model','jabatan_model'));
    }
	
	
	public function index()
	{
		$data = configs('Management User');
		$data['users'] = $this->users_model->getAllUsers()->result();
        $this->template->load('main','user_list', $data);
	}

	public function create( $userId = null )
	{
		$formdata = array();

		if( $userId )
		{
			$params = (int)$userId;
			$user = $this->users_model->getUser( $params );
			
			if($user->num_rows() > 0 )
			{
				$userdata = $user->row_array();

				$formdata['user_id'] = $userdata['user_id'];
				$formdata['role_id'] = $userdata['role_id'];
				$formdata['nip'] = $userdata['nip'];
				$formdata['fullname'] = $userdata['full_name'];
				$formdata['born_date'] = $userdata['born_date'];
				$formdata['email'] = $userdata['email'];
				$formdata['id_jabatan'] = $userdata['id_jabatan'];
				
			}else
			{
				$this->session->set_flashdata('message', 'invalid id not found');
				redirect('users');
			}
		}else
		{
			$formdata['user_id'] = "";
			$formdata['role_id'] = "";
			$formdata['nip'] = "";
			$formdata['fullname'] = "";
			$formdata['born_date'] = "";
			$formdata['email'] = "";
			$formdata['id_jabatan'] = "";
		}
		
		$data = configs('Create/Edit User');
		$data['jabatan'] = $this->jabatan_model->getAllJabatan();
		$data['formdata'] = $formdata;
		$this->template->load('main','user_form', $data);
	}

	public function saving()
	{
		if( isset ($_POST['save']) )
		{
			$validation_config = array(
				array(
					'field' => 'role_id',
					'rules' => 'trim|required',
					'label' => 'Role user'
				),
				array(
					'field' => 'nip',
					'rules' => 'trim|required|numeric',
					'label' => 'NIP'
				),
				array(
					'field' => 'fullname',
					'rules' => 'trim|required',
					'label' => 'Nama Lengkap',
				),
				array(
					'field' => 'born_date',
					'rules' => 'trim|required',
					'label' => 'Tanggal Lahir',
				),
				array(
					'field' => 'email',
					'rules' => 'trim|required|valid_email',
					'label' => 'Email',
				),
				array(
					'field' => 'id_jabatan',
					'rules' => 'trim|required',
					'label' => 'Jabatan',
				),
			);

			$postdata = $this->input->post();
			

			$this->form_validation->set_rules( $validation_config );
			$this->form_validation->set_message('required', '{field} wajib diisi');

			if( $this->form_validation->run() === FALSE )
			{
				$error['role_id'] = form_error('role_id');
				$error['nip'] = form_error('nip');
				$error['fullname'] = form_error('fullname');
				$error['born_date'] = form_error('born_date');
				$error['email'] = form_error('email');
				$error['id_jabatan'] = form_error('id_jabatan');

				$response['status'] = 0;
				$response['error'] = $error;
				$response['message'] = 'Error saving. please try again';
			}else
			{
				if(! $this->users_model->emailDuplicate($postdata['email']) === $_POST['save']) {
					$response['status'] = 0;
					$response['message'] = 'Email already use. Please use another email address';
				}else
				{
					$user_id = $this->users_model->saveUsers( $postdata );

					if($user_id)
					{
						$error['role_id'] = "";
						$error['nip'] = "";
						$error['fullname'] = "";
						$error['born_date'] = "";
						$error['email'] = "";
						$error['id_jabatan'] = "";

						$response['status'] = 1;
						$response['message'] = 'Successfuly! data has saved to datatabse';
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

	public function banned()
	{
		if(!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4)))
		{
			redirect('users');
		}
		$this->users_model->update_banned('tb_users', ['banned' => $this->uri->segment(3)], ['user_id ' => $this->uri->segment(4)]);
		redirect('users');
	}

	public function reset_pass($user_id)
	{
		$users = $this->db->get_where('tb_users', array('user_id' => $user_id))->row_array();
		$user = $users['email'];
		$pass = $users['born_date'];
		$pisah = explode('-', $pass);
		$larik = array($pisah[2], $pisah[1],$pisah[0]);
		$satukan = implode("", $larik);
		$password = $satukan;
		$options = array('cost' => 4);
		$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
		$data = array(
			'password' => $hashPassword,
		);
		$this->users_model->reset_pass($data, $user_id);
		echo $this->session->set_flashdata('message3', 'show-modal');
		echo $this->session->set_flashdata('uname', $user);  
        echo $this->session->set_flashdata('upass', $password); 
		redirect(site_url('users'));
	}

	public function delete()
	{
		$user_id = $_POST['user_id'];
	}
}
