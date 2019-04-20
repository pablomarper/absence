<?php

require_once('db_abstract_model.php');

class Falta extends DBAbstractModel
{

    private $id_falta;
    private $id_alu;
    private $id_asigna;
    private $dia;
    private $hora;
    private $id_tipo;
    private $justificada;
    private $tiposFalta = array();

    function __construct()
    {
        $this->db_name = 'absence';
    }

    public function getId_alu()
    {
        return $this->id_alu;
    }

    public function setId_alu($id_alu)
    {
        $this->id_alu = $id_alu;

        return $this;
    }

    public function getId_falta()
    {
        return $this->id_falta;
    }

    public function setId_falta($id_falta)
    {
        $this->id_falta = $id_falta;

        return $this;
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
    public function getDia()
    {
        return $this->dia;
    }

    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    public function getId_tipo()
    {
        return $this->id_tipo;
    }

    public function setId_tipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;

        return $this;
    }

    public function getJustificada()
    {
        return $this->justificada;
    }

    public function setJustificada($justificada)
    {
        $this->justificada = $justificada;

        return $this;
    }
    public function getTiposFalta()
    {
        return $this->tiposFalta;
    }

    public function setTiposFalta($tiposFalta)
    {
        $this->tiposFalta = $tiposFalta;

        return $this;
    }

    public function set($id_alu, $id_asigna, $id_tipo, $dia, $hora)
    {
        $this->query = "
        INSERT INTO faltas
        (id_alu, id_asigna, dia, hora, id_tipo, justificada)
        VALUES
        ('$id_alu', '$id_asigna', '$dia', '$hora', '$id_tipo', 'NO')
        ";

        $this->execute_single_query();
            
    }

    public function get($cod)
    {
        $this->query = "
        SELECT *
        FROM faltas
        WHERE id_falta = '$cod'
        ";

        $this->get_results_from_query();
        

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function justificar($prod_data = array())
    {
        foreach ($prod_data as $campo => $valor){
            $$campo = $valor;
        }

        $this->query = "
			UPDATE faltas
			SET id_tipo = '$id_tipo',
			id_alu = '$id_alu',
            id_asigna = '$id_asigna',
            dia = '$dia',
            hora = '$hora',
            justificada = 'SI'
			WHERE id_falta = '$id_falta'
        ";
        
        $this->execute_single_query();
    }

    public function delete($cod = '')
    {
        $this->query = "
		DELETE FROM falta
		WHERE id_falta = '$cod'
        ";
        
        $this->execute_single_query();
    }

    public function tiposDeFalta()
    {
        $this->query = "
        SELECT *
        FROM tipo_falta
        ";

        $this->get_results_from_query();

        if (count($this->rows) > 0){

            for ($i = 0; $i < count($this->rows); $i++) {
                $this->tiposFalta[$i] = $this->rows[$i];
            }
        }
    }
}