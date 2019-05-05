<?php

require_once('db_abstract_model.php');

class Admin extends DBAbstractModel
{

    private $user;
    private $passw;
    private $nombre;
    private $profesores = array();
    private $alumnos = array();

    function __construct()
    {
        $this->db_name = 'absence';
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getPassw()
    {
        return $this->passw;
    }

    public function setPassw($passw)
    {
        $this->passw = $passw;

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
    public function getProfesores()
    {
        return $this->profesores;
    }

    public function setProfesores($profesores)
    {
        $this->profesores = $profesores;

        return $this;
    }

    public function getAlumnos()
    {
        return $this->alumnos;
    }

    public function setAlumnos($alumnos)
    {
        $this->alumnos = $alumnos;

        return $this;
    }

    public function login($user, $pass)
    {
        $this->query = "
        SELECT user, passw, nombre
        FROM admin
        WHERE user = '$user' AND passw = '$pass'
        ";

        $this->get_results_from_query();

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function profes() {
        
        $this->query = "
        SELECT p.*
        FROM profesores p
        ";

        $this->get_results_from_query();

        if (count($this->rows) > 0){

            for ($i = 0; $i < count($this->rows); $i++) {
                $this->profesores[$i] = $this->rows[$i];
            }
        }
    }

    public function alumnos() {
        
        $this->query = "
        SELECT p.*
        FROM alumnos p
        ";

        $this->get_results_from_query();

        if (count($this->rows) > 0){

            for ($i = 0; $i < count($this->rows); $i++) {
                $this->alumnos[$i] = $this->rows[$i];
            }
        }
    }
}
?>