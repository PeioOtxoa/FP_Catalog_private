<?php

class familyClass
{
    protected $cod_familia;
    protected $nom_familia_eu;
    protected $nom_familia_es;

    public function getCod_familia()
    {
        return $this->cod_familia;
    }

    public function getNom_familia_eu()
    {
        return $this->nom_familia_eu;
    }

    public function getNom_familia_es()
    {
        return $this->nom_familia_es;
    }

    public function setCod_familia($cod_familia)
    {
        $this->cod_familia = $cod_familia;
    }

    public function setNom_familia_eu($nom_familia_eu)
    {
        $this->nom_familia_eu = $nom_familia_eu;
    }

    public function setNom_familia_es($nom_familia_es)
    {
        $this->nom_familia_es = $nom_familia_es;
    }
 
}

