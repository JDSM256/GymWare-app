<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X_Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/cliente.php');


    $control= $_GET['control'];

    $clientes= new Cliente($conexion);

    switch ($control) {
        case 'consulta':
            $vec= $clientes->consulta();
        break;
        case 'insertar':
            // $json=file_get_contents('php://input');
            $json='{"1":"43012789","identificacion":"43012789","2":"Fernanda Ortega","nombre_cliente":"Fernanda Ortega","3":"belen-malibú","direccion_cliente":"belen-malibú","4":"3147849632","celular_cliente":"3147849632","5":"fer.ortega@hotmail.es","email_cliente":"fer.ortega@hotmail.es","6":"300","fo_ciudad":"300"}';
            $params=json_decode($json);
            $vec=$clientes->insertar($params);

        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec= $clientes->eliminar($id);
        break;

        case'editar':
            // $json=file_get_contents('php://input');
            $json='{"1":"10467854","identificacion":"10467854","2":"Fernanda Medina","nombre_cliente":"Fernanda Medina","3":"belen-rincon","direccion_cliente":"belen-rincon","4":"3147849632","celular_cliente":"3147849632","5":"fer.ortega@hotmail.es","email_cliente":"fer.ortega@hotmail.es","6":"1","fo_ciudad":"1"}';
            $params=json_decode($json);
            $id=$_GET['id'];
            $vec= $clientes->editar($id,$params);
        break;
        case 'filtro':
            $dato=$_GET['dato'];
            $vec=$clientes->filtro($dato);
        break;

    }

    $datosj=json_encode($vec);
    echo $datosj;
    header('COntent-Type: application/json');

?>