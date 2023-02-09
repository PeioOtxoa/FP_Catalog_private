<?php

include_once '../model/cycleModel.php';

$data=json_decode(file_get_contents("php://input"),true);

$ciclo=new cycleModel();

$cod_familia=$data['cod_familia'];

$ciclo->setCod_familia($cod_familia);

$response=array();

$response['list']=$ciclo->setList();
$response['error']='no error';

echo json_encode($response);

unset($response);
