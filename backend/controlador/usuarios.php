<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X_Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/usuarios.php');


    $control= $_GET['control'];

    $usuarios= new Usuarios($conexion);

    switch ($control) {
        case 'consulta':
            $vec= $usuarios->consulta();
        break;
        case 'insertar':
            // $json=file_get_contents('php://input');
            // $json='{"1":"1145464878","cedula":"1145464878","2":"pepito perez ","nombre_usuario":"pepito perez ","3":"diagonal 75 bloque sur ","direccion":"diagonal 75 bloque sur","4":"1995-09-05","fecha_nacimiento":"1995-09-05","5":"3103156362","celular":"3103156362","6":"pepito_perez@hotmail.com","email_usuario":"pepito_perez@hotmail.com","7":"user","rol":"user","8":"pepito123","clave":"pepito123"}';
            $params=json_decode($json);
            $vec=$usuarios->insertar($params);

        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec= $usuarios->eliminar($id);
        break;

        case'editar':
            // $json=file_get_contents('php://input');
            $json='{"cedula":"1128282862","2":"pepito perez ","nombre_usuario":"pepito perez ","3":"diagonal 75 bloq   ue sur ","direccion":"diagonal 75 bloq   ue sur ","4":"1989-12-31","fecha_nacimiento":"1989-12-31","5":"3103156362","celular":"3103156362","6":"pepito_perez@hotmail.com,"email_usuario":"pepito_perez@hotmail.com,"7":"user","rol":"user","8":"pepito123","clave":"pepito123"}';
            $params=json_decode($json);
            $id=$_GET['id'];
            $vec= $usuarios->editar($id,$params);
        break;
        case 'filtro':
            $dato=$_GET['dato'];
            $vec=$usuarios->filtro($dato);
        break;

    }

    $datosj=json_encode($vec);
    echo $datosj;
    header('COntent-Type: application/json');

?>