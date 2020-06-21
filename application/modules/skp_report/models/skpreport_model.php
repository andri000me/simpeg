<?php

class Skpreport_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getAll($where = '')
	{
		$this->db->select('
				ts.*
				,tu.full_name
				,tu.id_jabatan
				,tj.jabatan_name
				,td.departemen_name
		');
		$this->db->from('tb_skp ts');
		$this->db->join('tb_users tu', 'ts.user_id=tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan=tj.id_jabatan');
		$this->db->join('tb_departemen td', 'tj.id_departemen=td.id_departemen');
		$this->db->where($where);
		$this->db->order_by('ts.user_id');

		return $this->db->get();
	}

	public function countSKP($where = '')
	{
		$this->db->select('
				COUNT(skp_id) as count_skp
				,ts.user_id
				,tu.full_name
				,tu.id_jabatan
				,tj.jabatan_name
				,td.departemen_name
			');
		$this->db->from('tb_skp ts');
		$this->db->join('tb_users tu', 'ts.user_id=tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan=tj.id_jabatan');
		$this->db->join('tb_departemen td', 'tj.id_departemen=td.id_departemen');
		$this->db->where($where);
		$this->db->group_by('ts.user_id');

		return $this->db->get();
	}
}
