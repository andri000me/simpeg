<?php

class Tugas_model extends CI_Model
{
    function __construct() 
	{
		parent::__construct();
        $this->load->database();
        $this->id = $this->session->userdata('user_id');
        date_default_timezone_set('ASIA/JAKARTA');
    }

    public function getSkpByUser($user_id)
    {
        $bln = date('m');
        $thn = date('Y');
        $start = $thn.'-'.$bln.'-01';
        $end = $thn.'-'.$bln.'-31';
        $where = ['skp.tanggal >=' => $start, 'skp.tanggal <=' => $end ];

        $this->db->select('skp.*');
        $this->db->from('tb_skp skp');
        $this->db->join('tb_users tu', 'skp.user_id=tu.user_id');
        $this->db->where('skp.user_id ='.$this->id.' ');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function cari($skp_id)
	{
        return $this->db->get_where('tb_skp', array('skp_id' => $skp_id));
    }
    
    public function validation_rules_skp()
    {
        return array(
            array(
                'field' => 'tanggal',
                'rules' => 'trim|required',
                'label' => 'Tanggal',
            ),
            array(
                'field' => 'skp_id',
                'rules' => 'trim|required',
                'label' => 'Jenis SKP',
            ),
            array(
                'field' => 'start_time',
                'rules' => 'trim|required',
                'label' => 'Jam mulai'
            ),
            array(
                'field' => 'end_time',
                'rules' => 'trim|required',
                'label' => 'Jam selesai'
            ),
            array(
                'field' => 'output',
                'rules' => 'trim|required|numeric',
                'label' => 'Hasil / Output',
            ),
            array(
                'field' => 'tab',
                'rules' => 'trim|required',
                'label' => 'pilih salah satu',
            )
        );
    }
    
    public function validation_rules_tambahan()
    {
        return array(
            array(
                'field' => 'kegiatan',
                'rules' => 'trim|required',
                'label' => 'Kegiatan',
            ),
            array(
                'field' => 'tanggal',
                'rules' => 'trim|required',
                'label' => 'Tanggal'
            ),
            array(
                'field' => 'start_time',
                'rules' => 'trim|required',
                'label' => 'Jam Mulai'
            ),
            array(
                'field' => 'end_time',
                'rules' => 'trim|required',
                'label' => 'Jam selesai',
            ),
            array(
                'field' => 'output',
                'rules' => 'trim|required',
                'label' => 'Hasil'
            ),
            array(
                'field' => 'satuan',
                'rules' => 'trim|required',
                'label' => 'satuan'
            ),
            array(
                'field' => 'pemberi_tugas',
                'rules' => 'trim|required',
                'label' => 'Pemberi Tugas',
            ),
            array(
                'field' => 'tab',
                'rules' => 'trim|required',
                'label' => 'Pilih salah satu'
            )

        );
    }

    public function insertTugas($data)
    {
        return $this->db->insert('tb_skp_realisasi', $data);
    }

    public function insertTambahan($data)
    {
        return $this->db->insert('tb_tugas_tambahan_staff', $data);
    }
}