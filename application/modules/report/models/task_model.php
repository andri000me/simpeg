<?php

class Task_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getAll()
	{
		$query = $this->db->query("SELECT
					tt.*
					,tu.full_name
					,tj.jabatan_name
					,td.departemen_name

				FROM tb_tugas_tambahan tt
				JOIN tb_users tu ON tt.user_id = tu.user_id
				JOIN tb_jabatan tj ON tu.id_jabatan = tj.id_jabatan
				JOIN tb_departemen td ON tj.id_departemen = td.id_departemen
				WHERE tt.create_at BETWEEN DATE_FORMAT(SUBDATE(NOW(),9), '%Y-%m-%d') AND NOW() AND tt.status = '0'
				ORDER BY tt.create_at DESC
		");
		return $query;
	}
	
	public function filterTugas($where)
	{
		$this->db->select('
					tt.*
					,tu.full_name
					,tj.jabatan_name
					,td.departemen_name
				');
		$this->db->from('tb_tugas_tambahan tt');
		$this->db->join('tb_users tu', 'tt.user_id = tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan = tj.id_jabatan');
		$this->db->join('tb_departemen td', 'tj.id_departemen = td.id_departemen');
		$this->db->where($where);
		$this->db->order_by('tt.create_at', 'DESC');

		return $this->db->get();
	}

	function approve_task($table = null, $data=null, $where=null){
		$this->db->update($table, $data, $where);
	}
}
