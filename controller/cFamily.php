<?php

include_once '../model/familyModel.php';
    
$response=array();
    
$familia=new familyModel();
    
$response['list']= $familia->setList();
$response['error']='no error';
    
echo json_encode($response);
    
unset($response);