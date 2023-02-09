<?php
include_once 'connect_data.php';
include_once 'familyClass.php';

class familyModel extends familyClass
{
    private $link;
  
    public function OpenConnect()
    {
        $konDat=new connect_data();
        try
        {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }
    
    public function CloseConnect()
    {
        mysqli_close ($this->link);
        
    }
   
    public function setList()
    {
        
        $this->OpenConnect();
        $sql="call spAllFamilies";
        
        $list=array();
        
        $result = $this->link->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {         
            //FILL LIST with all families
            $newFamilia=new familyModel();
            $newFamilia->cod_familia=$row['cod_familia'];
            $newFamilia->nom_familia_eu=$row['nom_familia_eu'];
            $newFamilia->nom_familia_es=$row['nom_familia_es'];
            
            array_push($list, get_object_vars($newFamilia));    
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $list;
    }
    
    /*
    public function findFamilyByCode()
    {
        $this->OpenConnect();
        
        $cod_familia=$this->cod_familia;
        
        $sql="call spFindFamilyIdFamily('$cod_familia')";
        $result= $this->link->query($sql);
        
        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            //FILL the cycle with info  $THIS
            $this->nom_familia_eu=$row['nom_familia_eu'];
            $this->nom_familia_es=$row['nom_familia_es'];            
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }*/

    public function ObjVars(){
        return get_object_vars($this);
    }

}

