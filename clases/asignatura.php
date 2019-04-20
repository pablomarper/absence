<?php

require_once('db_abstract_model.php');

class Asignatura extends DBAbstractModel 
{

    private $id_asigna;
    private $id_profe;
    private $nombre;

    function __construct()
    {
        $this->db_name = 'absence';
    }

    public function getId_asigna()
    {
        return $this->id_asigna;
    }

    public function setId_asigna($id_asigna)
    {
        $this->id_asigna = $id_asigna;

        return $this;
    }

    public function getId_profe()
    {
        return $this->id_profe;
    }

    public function setId_profe($id_profe)
    {
        $this->id_profe = $id_profe;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function get($cod)
    {
        $this->query = "
        SELECT *
        FROM asignaturas
        WHERE id_asigna = '$cod'
        ";

        $this->get_results_from_query();
        

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }
}

?>