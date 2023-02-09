<?php
include_once 'connect_data.php';
include_once 'cycleClass.php';
include_once 'familyModel.php';

class cycleModel extends cycleClass
{
    private $link;
  //  private $objFamilia;
    
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
        
        $cod_familia=$this->cod_familia;
        
        $sql="call spFindCyclesIdFamily('$cod_familia')";
        $result= $this->link->query($sql);
        
        $list=array();
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            //FILL LIST with all cycles
            
            $newCycle=new cycleModel();
            $newCycle->cod_ciclo=$row['cod_ciclo'];
            $newCycle->cod_familia=$row['cod_familia'];
            $newCycle->tipo=$row['tipo'];
            $newCycle->nom_ciclo_eu=$row['nom_ciclo_eu'];
            $newCycle->nom_ciclo_es=$row['nom_ciclo_es'];
            
            array_push($list, get_object_vars($newCycle));          
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $list;
    }

 /*   function findCycleByCode()
    {
        $this->OpenConnect();
        
        $cod_ciclo=$this->cod_ciclo;
        
        $sql="call spFindCycleIdCycle('$cod_ciclo')";
        $result= $this->link->query($sql);
        
        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {

            //FILL the cycle with info $THIS
            
            $this->cod_familia=$row['cod_familia'];
            $this->tipo=$row['tipo'];
            $this->nom_ciclo_eu=$row['nom_ciclo_eu'];
            $this->nom_ciclo_es=$row['nom_ciclo_es'];
            
            $newFamilia=new familyModel();
            $newFamilia->cod_familia=$row['cod_familia'];
            $newFamilia->findFamilyByCode();
            
            $this->objFamilia=$newFamilia;
        }
        mysqli_free_result($result);
        $this->CloseConnect();

    }*/

    public function ObjVars(){
        return get_object_vars($this);
    }
 
}

