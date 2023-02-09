<?php
include_once 'connect_data.php';
include_once 'offerClass.php';
include_once 'schoolModel.php';
include_once 'cycleModel.php';

class offerModel extends offerClass
{
    private $link;
    private $objCentro;
  //  private $objCiclo;
    
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

 
    public function setListShools()  
    {
        $this->OpenConnect();
        
        $cod_ciclo=$this->cod_ciclo;
        
        $sql="call spFindOfferIdCycle('$cod_ciclo')";
 
        $list=array();
        
        $result = $this->link->query($sql);
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {       
            //FILL list with all offers and each offer with his school info OBJCENTRO
            $newOferta=new OfferModel();
            $newOferta->cod_ciclo=$row['cod_ciclo'];
            $newOferta->cod_centro=$row['cod_centro'];
            $newOferta->modelo=$row['modelo'];
            $newOferta->turno=$row['turno'];
            
            
            $newEscuela=new schoolModel();
            //$newEscuela->cod_centro=$row['cod_centro'];
            $newEscuela->setCod_centro($row['cod_centro']);
            $newEscuela->findSchoolByCode();
            
            //$newOferta->objCentro=$newEscuela;
            $newOferta->objCentro=$newEscuela->ObjVars();

            //array_push($list, $newOferta);
            array_push($list, get_object_vars($newOferta));

        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $list;
    }

 /*   public function setListCycles()
    {
        $this->OpenConnect();
        $cod_centro=$this->cod_centro;
        $sql="call spFindOfferIdSchool($cod_centro)";
        $result = $this->link->query($sql);
        
        $list=array();
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {  
            //FILL list with all offers and each offer with his cycle info OBJCICLO
            $newOferta=new OfferModel();
            $newOferta->cod_ciclo=$row['cod_ciclo'];
            
            $newCiclo=new cycleModel();
            $newCiclo->cod_ciclo=$row['cod_ciclo'];
            $newCiclo->findCycleByCode();
            
            $newOferta->objCiclo=$newCiclo;
            
            array_push($list, $newOferta);
            
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $list;
    }*/

    public function ObjVars(){
        return get_object_vars($this);
    }

}

