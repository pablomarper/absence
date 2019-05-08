<?php

require_once('db_abstract_model.php');

class Alumno extends DBAbstractModel
{
    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $correo;
    private $passw;
    private $incidencias = array();

    function __construct()
    {
        $this->db_name = 'absence';
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;

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

    public function getApellido1()
    {
        return $this->apellido1;
    }

    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    public function getApellido2()
    {
        return $this->apellido2;
    }

    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    public function getPassw()
    {
        return $this->passw;
    }

    public function setPassw($pass)
    {
        $this->passw = $pass;

        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    public function getIncidencias()
    {
        return $this->incidencias;
    }

    public function setIncidencias($incidencias)
    {
        $this->incidencias = $incidencias;

        return $this;
    }

    public function set($prod_data = array())
    {

        foreach ($prod_data as $campo => $valor) {
            $$campo = $valor;
        }

        $this->query = "
        INSERT INTO alumnos
        (dni, nombre, apellido1, apellido2, correo, passw)
        VALUES
        ('$dni', '$nombre', '$apellido1', '$apellido2', '$correo', '$passw')
        ";

        $this->execute_single_query();
    }

    public function get($cod_prod = '')
    {
        if ($cod_prod != '') {
            $this->query = "
            SELECT dni, nombre, apellido1, apellido2, correo, passw
            FROM alumnos
            WHERE dni = '$cod_prod'
            ";

            $this->get_results_from_query();
        }

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function edit($prod_data = array())
    {
        foreach ($prod_data as $campo => $valor){
            $$campo = $valor;
        }

        $this->query = "
			UPDATE alumnos
			SET correo = '$correo',
			nombre = '$nombre',
            apellido1 = '$apellido1',
            apellido2 = '$apellido2',
            passw = '$passw'
			WHERE dni = '$dni'
        ";
        
        $this->execute_single_query();
    }

    public function delete($dni = '')
    {
        $this->query = "
		DELETE FROM alumnos
		WHERE dni = '$dni'
        ";
        
        $this->execute_single_query();
    }

    public function login($user, $pass)
    {
        $this->query = "
        SELECT dni, nombre, apellido1, apellido2, correo, passw
        FROM alumnos
        WHERE dni = '$user' AND passw = '$pass'
        ";

        $this->get_results_from_query();

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function faltas($cod, $mes) 
    {
        if ($cod != "") {
            $this->query = "
            SELECT t.descripcion, f.*, asi.nombre
            FROM tipo_falta t INNER JOIN faltas f
	            ON t.id_tipo = f.id_tipo INNER JOIN alumnos a
    	            ON f.id_alu = a.dni INNER JOIN asignaturas asi
        	            ON f.id_asigna = asi.id_asigna
            WHERE a.dni = '$cod' AND f.dia LIKE '%/$mes'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->incidencias[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function buscar($cod) {
        if ($cod != '') {
            $this->query = "
            SELECT * 
            FROM alumnos 
            WHERE dni = '$cod'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){
                return true;
            }
            return false;
        }
    } 
}