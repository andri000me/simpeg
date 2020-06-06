<?php

class Tugas_model extends CI_Model
{
    function __construct() 
	{
		parent::__construct();
        $this->load->database();
        $this->id = $this->session->userdata('user_id');
    }

    public function getSkpByUser($user_id)
    {
        date_default_timezone_set('ASIA/JAKARTA');
        $month = bulan(date('m'));

        $this->db->select('skp.*');
        $this->db->from('tb_skp skp');
        $this->db->join('tb_users tu', 'skp.user_id=tu.user_id');
        $this->db->where('skp.user_id ='.$this->id.' AND month = "'.$month.'" ');
        return $this->db->get()->result_array();
    }
}