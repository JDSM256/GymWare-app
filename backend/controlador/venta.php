<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X_Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/venta.php');


    $control= $_GET['control'];

    $venta= new Venta($conexion);

    switch ($control) {
        case 'consulta':
            $vec= $venta->consulta();
        break;
        case 'insertar':
            // $json=file_get_contents('php://input');
            // $json='{"1":"2024-06-20","fecha":"2024-06-20","2":"1","fo_cliente":"1","3":"2","fo_plan":"2","4":"2","cantidad":"2","5":"100000","subtotal":"100000","6":"1","fo_usuario":"1","7":"100000","total":"100000"}';
            $params=json_decode($json);
            $vec=$venta->insertar($params);

        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec= $venta->eliminar($id);
        break;

        case'editar':
            // $json=file_get_contents('php://input');
            $json='{"1":"2024-06-15","fecha":"2024-06-15","2":"1","fo_cliente":"1","3":"2","fo_plan":"2","4":"2","cantidad":"2","5":"100000","subtotal":"100000","6":"1","fo_usuario":"1","7":"100000","total":"100000"}';
            $params=json_decode($json);
            $id=$_GET['id'];
            $vec= $venta->editar($id,$params);
        break;
        case 'filtro':
            $dato=$_GET['dato'];
            $vec=$venta->filtro($dato);
        break;

    }

    $datosj=json_encode($vec);
    echo $datosj;
    header('COntent-Type: application/json');

?>