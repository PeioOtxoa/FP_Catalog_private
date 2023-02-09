<?php

class offerClass
{
    protected $codigo;
    protected $cod_ciclo;
    protected $cod_centro;
    protected $modelo;
    protected $turno;


    public function getCod_ciclo()
    {
        return $this->cod_ciclo;
    }

    public function getCod_centro()
    {
        return $this->cod_centro;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getTurno()
    {
        return $this->turno;
    }

    public function setCod_ciclo($cod_ciclo)
    {
        $this->cod_ciclo = $cod_ciclo;
    }

    public function setCod_centro($cod_centro)
    {
        $this->cod_centro = $cod_centro;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setTurno($turno)
    {
        $this->turno = $turno;
    }
   
}

