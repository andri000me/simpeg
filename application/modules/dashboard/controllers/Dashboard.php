<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

        function __construct()
        {
                parent::__construct();
                is_login();
		
        }
        
	public function index()
	{
                $data = configs('Dashboard');
                $data['isi'] = "hello";
                $this->template->load('main','dashboard', $data);
        
	}
}
