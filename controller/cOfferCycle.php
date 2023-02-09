<?php

    include_once '../model/offerModel.php';
    
    $data=json_decode(file_get_contents("php://input"),true);
    
    $oferta=new offerModel();
    
    $cod_ciclo=$data['cod_ciclo'];
    
    $oferta->setCod_ciclo($cod_ciclo);
    
    $response=array();
    
    $response['list']=$oferta->setListShools();
    $response['error']='no error';
    
    echo json_encode($response);
    
    unset($response);
    
 
    