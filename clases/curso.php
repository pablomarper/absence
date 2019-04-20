<?php

require_once('db_abstract_model.php');

class Curso extends DBAbstractModel 
{

    private $id_curso;
    private $id_tutor;
    private $nombre;

    function __construct()
    {
        $this->db_name = 'absence';
    }

    public function getId_curso()
    {
        return $this->id_curso;
    }

    public function setId_curso($id_curso)
    {
        $this->id_curso = $id_curso;

        return $this;
    }

    public function getId_tutor()
    {
        return $this->id_tutor;
    }

    public function setId_tutor($id_tutor)
    {
        $this->id_tutor = $id_tutor;

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
        FROM cursos
        WHERE id_curso = '$cod'
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