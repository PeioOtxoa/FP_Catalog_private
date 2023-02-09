<?php

class schoolClass
{
    protected $territorio;
    protected $dependencia;
    protected $cod_centro;
    protected $nom_centro;
    protected $direccion;
    protected $municipio;
    protected $cp;
    protected $telefono;
    protected $fax;
    protected $email;
    protected $web;
    protected $coord_x;
    protected $coord_y;
  
    public function getTerritorio()
    {
        return $this->territorio;
    }

    public function getDependencia()
    {
        return $this->dependencia;
    }

    public function getCod_centro()
    {
        return $this->cod_centro;
    }

    public function getNom_centro()
    {
        return $this->nom_centro;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getMunicipio()
    {
        return $this->municipio;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getWeb()
    {
        return $this->web;
    }

    public function getCoord_x()
    {
        return $this->coord_x;
    }

    public function getCoord_y()
    {
        return $this->coord_y;
    }

    public function setTerritorio($territorio)
    {
        $this->territorio = $territorio;
    }

    public function setDependencia($dependencia)
    {
        $this->dependencia = $dependencia;
    }

    public function setCod_centro($cod_centro)
    {
        $this->cod_centro = $cod_centro;
    }

    public function setNom_centro($nom_centro)
    {
        $this->nom_centro = $nom_centro;
    }


    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function setWeb($web)
    {
        $this->web = $web;
    }

    public function setCoord_x($coord_x)
    {
        $this->coord_x = $coord_x;
    }

    public function setCoord_y($coord_y)
    {
        $this->coord_y = $coord_y;
    }

}

