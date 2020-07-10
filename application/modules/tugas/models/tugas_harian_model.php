<?php

class Tugas_harian_model extends CI_Model
{
    function __construct() 
	{
		parent::__construct();
        $this->load->database();
        $this->id = $this->session->userdata('user_id');
        date_default_timezone_set('ASIA/JAKARTA');
    }

    public function FunctionName(Type $var = null)
    {
        # code...
    }

}