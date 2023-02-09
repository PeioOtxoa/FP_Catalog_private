<?php
include_once 'connect_data.php';
include_once 'schoolClass.php';

class schoolModel extends schoolClass
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
        try
        {
            $this->link->close();
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        
    }


    function findSchoolByCode()
    {
        $this->OpenConnect();
        $cod_centro=$this->cod_centro;
        $sql="call spFindSchoolIdSchool($cod_centro)";
        $result= $this->link->query($sql);
        
        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC));
        {    
            //FILL the SCHOOL with info $THIS
            $this->nom_centro=$row['nom_centro'];
            $this->municipio=$row['municipio'];
            $this->territorio=$row['territorio'];          
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }

    public function ObjVars(){
        return get_object_vars($this);
    }
    
}

