<?php
class Autorizados_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($idorden, $codanalisis)
    {
        $data = Array(
            'idorden'           => $idorden,
            'codigoanalisis'    => $codanalisis
        );

        $this->db->insert('autorizados', $data);
        $this->db->trans_complete();

        if($this->db->affected_rows()  > 0)
            return 1;
        else
            return 0;
    }

}