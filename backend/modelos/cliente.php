<?php
    class Cliente{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    //metodos
    //consulta
    // public function consulta(){
    //     $con= "SELECT p.*, c.nombre AS identificacion, pr.nombre AS nombre_cliente, vg.nombre AS email_cliente from cliente p
    //     INNER JOIN identificacion c ON p.fo_cliente= c.id_cliente
    //     INNER JOIN precio c ON p.fo_precio= c.id_cliente
    //     ORDER BY p.nombre"; 
    //     $res=mysqli_query($this->conexion, $con);
    //     $vec=[];
    //     while ($row=mysqli_fetch_array($res)) {
    //         $vec[]=$row;            # code...
    //     }

    //     return $vec;
    // }

    public function consulta(){
        $con= "SELECT * FROM cliente ORDER BY nombre_cliente";
        $res= mysqli_query($this->conexion, $con);
        $vec=[];
        while ($row=mysqli_fetch_array($res)) {
            $vec[]=$row;            # code...
        }

        return $vec;
    }


    //eliminar
    public function eliminar($id){
        $del="DELETE FROM cliente WHERE id_cliente=$id";
        mysqli_query($this->conexion, $del);
        $vec=[];
        $vec['resultado']='ok';
        $vect['mensaje']='el cliente ha sido eliminado';
        return $vec;
    }

    //editar

 

    public function editar($id,$params){
        $editar= "UPDATE cliente SET identificacion='$params->identificacion', nombre_cliente='$params->nombre_cliente', direccion_cliente='$params->direccion_cliente', celular_cliente='$params->celular_cliente',email_cliente='$params->email_cliente', fo_ciudad='$params->fo_ciudad'  WHERE id_cliente=$id";
        mysqli_query($this->conexion, $editar);
        $vec=[];
        $vect["resultado"]= "ok";
        $vect["mensaje"]= "el nombre del cliente ha sido editado";
        return $vec;
    }

  

    //insertar

    public function insertar($params){
        $ins="INSERT INTO cliente(identificacion,nombre_cliente, direccion_cliente, celular_cliente,email_cliente, fo_ciudad) VALUES ('$params->identificacion', '$params->nombre_cliente', '$params->direccion_cliente', '$params->celular_cliente', '$params->email_cliente', '$params->fo_ciudad') ";
        mysqli_query($this->conexion, $ins);
        $vec=[];
        $vect["resultado"]= "ok";
        $vect["mensaje"]= "el nuevo campo de registro de usuario ha sido guardado";
        return $vec;
    
    
    }
    //filtro 
    public function filtro($valor){
        $filtro= "SELECT * FROM cliente WHERE total LIKE '%$valor%'";
        $res=mysqli_query($this->conexion, $filtro);
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
        }

        return $vec;

    }

    public function filtro_fecha($valor){
        $filtro= "SELECT * FROM cliente WHERE fecha LIKE '%$valor%'";
        $res=mysqli_query($this->conexion, $filtro);
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
        }

        return $vec;

        
    }

    public function filtro_cliente($valor){
        $filtro= "SELECT * FROM cliente WHERE fo_cliente LIKE '%$valor%'";
        $res=mysqli_query($this->conexion, $filtro);
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
        }

        return $vec;

    }


}
?>