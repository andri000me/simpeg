<?php

class Userlevel_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
    }

    public function get_all($table)
    {
        $this->db->from($table);
        return $this->db->get();
    }

    public function getRole($params)
    {
        return $this->db->get_where('tb_roles', array('role_id' => $params));
    }

    public function saveRole( $params)
    {
        $params_insert['role_name'] = $params['role_name'];
        $params_insert['description'] = $params['description'];

        if( empty($params['role_id']))
        {
            $params_insert['create_at'] = date('Y-m-d H:i:s');

            $insert = $this->db->insert('tb_roles', $params_insert);
            $role_id = $this->db->insert_id();
            
            return $role_id;
        }else{
            $params_insert['update_at'] = date('Y-m-d H:i:s');
            $role_id = $params['role_id'];
			$this->db->update('tb_roles', $params_insert, array('role_id' => $role_id));
			return $role_id;
        }
    }

    function destroy($role_id){
		$this->db->where('role_id', $role_id);
		$this->db->delete('tb_roles');
    }
    
    function destroy_permission($role_id)
    {
        $this->db->where('role_id', $role_id);
        $this->db->delete('tb_role_permission');
    }
    
}