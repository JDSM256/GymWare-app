<?php
    class Planes{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    //metodos
    //consulta
    // public function consulta(){
    //     $con= "SELECT p.*, c.nombre AS codigo_plan, pr.nombre AS precio_plan, vg.nombre AS nombre_plan from planes p
    //     INNER JOIN nombre_plan c ON p.fo_plan= c.id_plan
    //     INNER JOIN precio c ON p.fo_precio= c.id_plan
    //     ORDER BY p.nombre"; 
    //     $res=mysqli_query($this->conexion, $con);
    //     $vec=[];
    //     while ($row=mysqli_fetch_array($res)) {
    //         $vec[]=$row;            # code...
    //     }

    //     return $vec;
    // }
    public function consulta(){
        $con= "SELECT * FROM planes ORDER BY precio_plan";
        $res= mysqli_query($this->conexion, $con);
        $vec=[];
        while ($row=mysqli_fetch_array($res)) {
            $vec[]=$row;            # code...
        }

        return $vec;
    }


    //eliminar
    public function eliminar_plan($id){
        $del="DELETE FROM planes WHERE id_plan=$id";
        mysqli_query($this->conexion, $del);
        $vec=[];
        $vec['resultado']='ok';
        $vect['mensaje']='el plan ha sido eliminado';
        return $vec;
    }

    //editar

    public function editar($id,$params){
        $editar= "UPDATE planes SET nombre_plan='$params->nombre_plan' WHERE id_plan=$id";
        mysqli_query($this->conexion, $editar);
        $vec=[];
        $vect["resultado"]= "ok";
        $vect["mensaje"]= "el nombre del plan ha sido editado";
        return $vec;
    }

    //insertar

    public function insertar($params){
        $ins="INSERT INTO planes(codigo_plan, nombre_plan, precio_plan) VALUES ('$params->codigo_plan', '$params->nombre_plan', '$params->precio_plan') ";
        mysqli_query($this->conexion, $ins);
        $vec=[];
        $vect["resultado"]= "ok";
        $vect["mensaje"]= "el nuevo campo de registro de planes ha sido guardado";
        return $vec;
    
    }
    //filtro 
    public function filtro($valor){
        $filtro= "SELECT * FROM planes WHERE precio LIKE '%$valor%'";
        $res=mysqli_query($this->conexion, $filtro);
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
        }

        return $vec;

    }

}
?>