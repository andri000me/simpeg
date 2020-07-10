<?php

class Skp_model extends CI_Model
{
    function __construct() 
	{
		parent::__construct();
        $this->load->database();
        $this->id = $this->session->userdata('user_id');
    }

    public function getSkp($user_id)
    {
        $bln = date('m');
        $thn = date('Y');
        $start = $thn.'-'.$bln.'-01';
        $end = $thn.'-'.$bln.'-31';
        $where = ['skp.tanggal >=' => $start, 'skp.tanggal <=' => $end ];

        $this->db->select('
                        skp.*
                        ,tu.full_name
                    ');
        $this->db->from('tb_skp skp');
        $this->db->join('tb_users tu', 'skp.user_id = tu.user_id');
        $this->db->where('skp.user_id = '.$user_id.' ');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function getSkpById($params)
    {
        date_default_timezone_set('ASIA/JAKARTA');
        $month = date('Y-m');

        $this->db->select('skp.*');
        $this->db->from('tb_skp skp');
        $this->db->join('tb_users tu', 'skp.user_id=tu.user_id');
        $this->db->where('skp.user_id ='.$this->id.' AND skp_id = '.$params.' ');
        return $this->db->get();
    }

    public function validation_rules()
    {
        return array(
            array(
                'field' => 'kegiatan',
                'rules' => 'trim|required',
                'label' => 'Kegiatan',
            ),
            array(
                'field' => 'kuantitas',
                'rules' => 'trim|required',
                'label' => 'Kuantitas (Output)',
            ),
            array(
                'field' => 'satuan',
                'rules' => 'trim|required',
                'label' => 'Satuan',
            ),
            array(
                'field' => 'kualitas',
                'rules' => 'trim|required',
                'label' => 'Kualitas (Mutu)',
            ),
            array(
                'field' => 'waktu',
                'rules' => 'trim|required',
                'label' => 'Waktu',
            )
        );
    }

    public function saving($params)
    {
        $params_insert['kegiatan'] = $params['kegiatan'];
        $params_insert['kuantitas'] = $params['kuantitas'];
        $params_insert['satuan'] = $params['satuan'];
        $params_insert['kualitas'] = $params['kualitas'];
        $params_insert['waktu'] = $params['waktu'];
        $params_insert['user_id'] = $this->id;

        if(empty($params['skp_id']))
        {
            $params_insert['create_at'] = date('Y-m-d H:i:s');
            $params_insert['tanggal'] = date('Y-m-d');
            $insert = $this->db->insert('tb_skp', $params_insert);
            $skp_id = $this->db->insert_id();
            return $skp_id;
        }
        else
        {
            $skp_id = $params['skp_id'];
            $this->db->update('tb_skp', $params_insert, array('skp_id'=>$skp_id));
            
            return $skp_id;
        }
    }

    function destroy($skp_id){
		$this->db->where('skp_id', $skp_id);
		$this->db->where('user_id', $this->id);
		$this->db->delete('tb_skp');
    }

}