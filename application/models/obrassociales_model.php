<?php

class Obrassociales_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_nombreobrasocial()
    {
        $consulta = $this->db->query('SELECT nombreobrasocial FROM obrassociales');

        return $consulta->result_array();
    }

    public function get_idOS($nombreOS)
    {
        $consulta = $this->db->like('nombreobrasocial',$nombreOS);
        $consulta = $this->db->select('idobrasocial');
        $consulta = $this->db->get('obrassociales');

        return $consulta->result_array();
    }


}