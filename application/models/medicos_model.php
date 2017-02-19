<?php

class Medicos_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_apellidomedico()//get_apellido
    {
        $consulta = $this->db->query('SELECT apellidomedico FROM medicos');

        return $consulta->result_array();
    }

    public function get_idmedico($apellidomedico)
    {
        $consulta = $this->db->like('apellidomedico',$apellidomedico);
        $consulta = $this->db->select('idmedico');
        $consulta = $this->db->get('medicos');

        //$consulta = $this->db->query('SELECT idmedico FROM medicos');

        return $consulta->result_array();
    }



}