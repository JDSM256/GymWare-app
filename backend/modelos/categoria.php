<?php
    class Categoria{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    //metodos
    //consulta
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
    public function eliminar($id){
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
        $ins="INSERT INTO planes(nombre) VALUES ('$params->nombre') ";
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