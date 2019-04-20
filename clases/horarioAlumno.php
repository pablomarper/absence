<?php

require_once('db_abstract_model.php');

class HorarioAlumno extends DBAbstractModel
{

    private $primera = array();
    private $segunda = array();
    private $tercera = array();
    private $cuarta = array();
    private $quinta = array();
    private $sexta = array();
    private $septima = array();

    function __construct()
    {
        $this->db_name = 'absence';
    }

    public function getPrimera() 
    {
        return $this->primera;
    }

    public function getSegunda() 
    {
        return $this->segunda;
    }

    public function getTercera() 
    {
        return $this->tercera;
    }

    public function getCuarta() 
    {
        return $this->cuarta;
    }

    public function getQuinta() 
    {
        return $this->quinta;
    }

    public function getSexta() 
    {
        return $this->sexta;
    }

    public function getSeptima() 
    {
        return $this->septima;
    }

    public function primera($cod)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT h.*
            FROM horario_asig h INNER JOIN alumnos_asig ag
	            ON h.id_curso = ag.id_curso
            WHERE ag.id_alu = '$cod' AND h.hora = '1'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->primera[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function segunda($cod)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT h.*
            FROM horario_asig h INNER JOIN alumnos_asig ag
	            ON h.id_curso = ag.id_curso
            WHERE ag.id_alu = '$cod' AND h.hora = '2'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->segunda[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function tercera($cod)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT h.*
            FROM horario_asig h INNER JOIN alumnos_asig ag
	            ON h.id_curso = ag.id_curso
            WHERE ag.id_alu = '$cod' AND h.hora = '3'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->tercera[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function cuarta($cod)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT h.*
            FROM horario_asig h INNER JOIN alumnos_asig ag
	            ON h.id_curso = ag.id_curso
            WHERE ag.id_alu = '$cod' AND h.hora = '4'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->cuarta[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function quinta($cod)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT h.*
            FROM horario_asig h INNER JOIN alumnos_asig ag
	            ON h.id_curso = ag.id_curso
            WHERE ag.id_alu = '$cod' AND h.hora = '5'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->quinta[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function sexta($cod)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT h.*
            FROM horario_asig h INNER JOIN alumnos_asig ag
	            ON h.id_curso = ag.id_curso
            WHERE ag.id_alu = '$cod' AND h.hora = '6'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->sexta[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function septima($cod)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT h.*
            FROM horario_asig h INNER JOIN alumnos_asig ag
	            ON h.id_curso = ag.id_curso
            WHERE ag.id_alu = '$cod' AND h.hora = '7'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->septima[$i] = $this->rows[$i];
                }
            }
        }
    }

}

?>