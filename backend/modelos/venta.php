<?php
    class Venta{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    //metodos
    //consulta
    // public function consulta(){
    //     $con= "SELECT p.*, c.nombre AS cedula, pr.nombre AS nombre_venta, vg.nombre AS email_venta from venta p
    //     INNER JOIN cedula c ON p.fo_venta= c.id_venta
    //     INNER JOIN precio c ON p.fo_precio= c.id_venta
    //     ORDER BY p.nombre"; 
    //     $res=mysqli_query($this->conexion, $con);
    //     $vec=[];
    //     while ($row=mysqli_fetch_array($res)) {
    //         $vec[]=$row;            # code...
    //     }

    //     return $vec;
    // }

    public function consulta(){
        $con= "SELECT * FROM venta ORDER BY fecha";
        $res= mysqli_query($this->conexion, $con);
        $vec=[];
        while ($row=mysqli_fetch_array($res)) {
            $vec[]=$row;            # code...
        }

        return $vec;
    }



    //eliminar
    public function eliminar($id){
        $del="DELETE FROM venta WHERE id_venta=$id";
        mysqli_query($this->conexion, $del);
        $vec=[];
        $vec['resultado']='ok';
        $vect['mensaje']='el venta ha sido eliminado';
        return $vec;
    }

    //editar

    public function editar($id,$params){
        $editar= "UPDATE venta SET fecha='$params->fecha', fo_cliente='$params->fo_cliente', fo_plan='$params->fo_plan', cantidad='$params->cantidad', subtotal='$params->subtotal', fo_usuario='$params->fo_usuario', total='$params->total' WHERE id_venta=$id";
        mysqli_query($this->conexion, $editar);
        $vec=[];
        $vect["resultado"]= "ok";
        $vect["mensaje"]= "el nombre del venta ha sido editado";
        return $vec;
    }


    //insertar
    public function insertar($params){
        $ins="INSERT INTO venta (fecha, fo_cliente, fo_plan, cantidad, subtotal, fo_usuario, total) VALUES ('$params->fecha', '$params->fo_cliente', '$params->fo_plan', '$params->cantidad','$params->subtotal','$params->fo_usuario','$params->total') ";
        mysqli_query($this->conexion, $ins);
        $vec=[];
        $vect["resultado"]= "ok";
        $vect["mensaje"]= "el nuevo campo de registro de usuario ha sido guardado";
        return $vec;
    
    }
 
    //filtro 
    public function filtro($valor){
        $filtro= "SELECT * FROM venta WHERE total LIKE '%$valor%'";
        $res=mysqli_query($this->conexion, $filtro);
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
        }

        return $vec;

    }




}
?>