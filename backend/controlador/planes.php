<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X_Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/planes.php');


    $control= $_GET['control'];

    $cate= new Planes($conexion);

    switch ($control) {
        case 'consulta':
            $vec= $cate->consulta();
        break;
        case 'insertar':
            // $json=file_get_contents('php://input');
            $json='{"codigo_plan":"1045","2":"plan amory&amistad","nombre_plan":"plan amory&amistad","3":"250000","precio_plan":"250000"}';
            $params=json_decode($json);
            $vec=$cate->insertar($params);

        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec= $cate->eliminar_plan($id);
        break;

        case'editar':
            // $json=file_get_contents('php://input');
            
            $params=json_decode($json);
            $id=$_GET['id'];
            $vec= $cate->editar($id,$params);
        break;
        case 'filtro':
            $dato=$_GET['dato'];
            $vec=$cate->filtro($dato);
        break;

    }

    $datosj=json_encode($vec);
    echo $datosj;
    header('COntent-Type: application/json');

?>