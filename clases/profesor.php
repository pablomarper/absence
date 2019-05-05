<?php

require_once('db_abstract_model.php');

class Profesor extends DBAbstractModel
{

    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $correo;
    private $passw;
    private $claseTuto = array();
    private $tutor = false;
    private $tutoria = array();
    private $asignaturas = array();
    private $cursos = array();
    private $alumnos  = array();

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

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }
  
    public function getPassw()
    {
        return $this->passw;
    }

    public function setPassw($password)
    {
        $this->passw = $password;

        return $this;
    }

    public function getTutor()
    {
        return $this->tutor;
    }
 
    public function setTutor($tutor)
    {
        $this->tutor = $tutor;

        return $this;
    }

    public function getClaseTuto()
    {
        return $this->claseTuto;
    }

    public function setClaseTuto($claseTuto)
    {
        $this->claseTuto = $claseTuto;

        return $this;
    }

    public function getTutoria()
    {
        return $this->tutoria;
    }

    public function setTutoria($tutoria)
    {
        $this->tutoria = $tutoria;

        return $this;
    }

    public function getAsignaturas() 
    {
        return $this->asignaturas;
    }

    public function getCursos() 
    {
        return $this->cursos;
    }

    public function getAlumnos() 
    {
        return $this->alumnos;
    }

    public function set($prod_data = array())
    {

        foreach ($prod_data as $campo => $valor) {
            $$campo = $valor;
        }

        $this->query = "
        INSERT INTO profesores
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
            FROM profesores
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
			UPDATE profesores
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
		DELETE FROM profesores
		WHERE dni = '$dni'
        ";
        
        $this->execute_single_query();
    }

    public function get_todos()
    {
        $this->query = "
        SELECT dni, nombre, apellido, correo
        FROM profesores
        ";

        $this->get_results_from_query();
        $this->cuantos = count($this->rows);
    }

    public function login($user, $pass)
    {
        $this->query = "
        SELECT dni, nombre, apellido1, apellido2, correo, passw
        FROM profesores
        WHERE dni = '$user' AND passw = '$pass'
        ";

        $this->get_results_from_query();

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function asignaturas($cod)
    {
        if ($cod != '') {
            $this->query = "
            SELECT a.nombre, a.id_asigna
            FROM profesores=p INNER JOIN asignaturas=a
	            ON p.dni = a.id_profe
            WHERE p.dni = '$cod'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->asignaturas[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function cursos($cod, $id_asigna)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT c.nombre, c.id_curso 
            FROM profesores=p INNER JOIN asignaturas=a
	            ON p.dni = a.id_profe INNER JOIN horario_asig=h
    	            ON a.id_asigna = h.id_asigna INNER JOIN cursos=c
        	            ON h.id_curso = c.id_curso
            WHERE p.dni = '$cod' AND h.id_asigna = '$id_asigna'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->cursos[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function alumnos($cod, $id_curso, $id_asigna)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT al.*, aa.repetidor
            FROM profesores=p INNER JOIN asignaturas=a
            	ON p.dni = a.id_profe INNER JOIN alumnos_asig=aa
            		ON a.id_asigna = aa.id_asigna INNER JOIN alumnos al
                    	ON aa.id_alu = al.dni
            WHERE p.dni = '$cod' AND aa.id_asigna = '$id_asigna' AND aa.id_curso = '$id_curso'
            ORDER BY al.apellido1 
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->alumnos[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function esTutor($cod)
    {
        $this->query = "
        SELECT * 
        FROM cursos 
        WHERE id_tutor = '$cod'
        ";

        $this->get_results_from_query();

        if (count($this->rows) > 0){
            $this->tutor = true;
        }
    }

    public function tutoria($cod)
    {
        if ($cod != '') {
            $this->query = "
            SELECT DISTINCT a.*, aa.repetidor
            FROM cursos c INNER JOIN alumnos_asig aa
	            ON c.id_curso = aa.id_curso INNER JOIN alumnos a
    	            ON aa.id_alu = a.dni
            WHERE c.id_tutor = '$cod'
            ORDER BY a.apellido1
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->tutoria[$i] = $this->rows[$i];
                }
            }
        }
    }

    public function claseTutoria($cod) {
        if ($cod != '') {
            $this->query = "
            SELECT * 
            FROM cursos 
            WHERE id_tutor = '$cod'
            ";

            $this->get_results_from_query();

            if (count($this->rows) > 0){

                for ($i = 0; $i < count($this->rows); $i++) {
                    $this->claseTuto = $this->rows[$i];
                }
            }
        }
    }

    public function buscar($cod) {
        if ($cod != '') {
            $this->query = "
            SELECT * 
            FROM profesores 
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
 