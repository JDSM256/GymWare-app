<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X_Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/venta_planes.php');


    $control=$_GET['control'];

    $cate= new Planes($conexion);

    switch ($control) {
        case '$consulta':
            $vec= $cate->consulta();
        break;
        case 'insertar':
            $json=file_get_contents('php://input');
            $params=json_decode($json);
            $vec=$cate->insertar($params);
        break;


    }

    $datosj=json_encode($vec);
    echo $datosj;
    header('COntent-Type: application/json');

?>