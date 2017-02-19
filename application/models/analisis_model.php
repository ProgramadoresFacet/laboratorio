<?php

class Analisis_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_nombreanalisis()
    {
        $consulta = $this->db->query('SELECT nombreanalisis FROM analisis');

        return $consulta->result_array();
    }

    public function get_analisis($analisis)
    {
        $query = $this->db->like("codigoanalisis", $analisis);
        $query = $this->db->get("analisis");
        $fila = $query->result();
        return $fila;
    }

    public function get_analisis1($analisis)
    {
        $query = $this->db->like("nombreanalisis",$analisis);
        $query = $this->db->get("analisis");
        $fila = $query->result();
        return $fila;
    }
}