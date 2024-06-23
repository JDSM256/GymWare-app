<?php
    class Usuarios{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    //metodos
    //consulta
    // public function consulta(){
    //     $con= "SELECT p.*, c.nombre AS cedula, pr.nombre AS nombre_usuario, vg.nombre AS email_usuario from usuario p
    //     INNER JOIN cedula c ON p.fo_usuario= c.id_usuario
    //     INNER JOIN precio c ON p.fo_precio= c.id_usuario
    //     ORDER BY p.nombre"; 
    //     $res=mysqli_query($this->conexion, $con);
    //     $vec=[];
    //     while ($row=mysqli_fetch_array($res)) {
    //         $vec[]=$row;            # code...
    //     }

    //     return $vec;
    // }

    public function consulta(){
        $con= "SELECT * FROM usuario ORDER BY nombre_usuario";
        $res= mysqli_query($this->conexion, $con);
        $vec=[];
        while ($row=mysqli_fetch_array($res)) {
            $vec[]=$row;            # code...
        }

        return $vec;
    }




    //eliminar
    public function eliminar($id){
        $del="DELETE FROM usuario WHERE id_usuario=$id";
        mysqli_query($this->conexion, $del);
        $vec=[];
        $vec['resultado']='ok';
        $vect['mensaje']='el usuario ha sido eliminado';
        return $vec;
    }

    //editar

    public function editar($id,$params){
        $editar= "UPDATE usuario SET cedula='$params->cedula', nombre_usuario='$params->nombre_usuario', direccion='$params->direccion', fecha_nacimiento='$params->fecha_nacimiento', celular='$params->celular', email_usuario='$params->email_usuario', rol='$params->rol', clave='$params->clave' WHERE id_usuario=$id";
        mysqli_query($this->conexion, $editar);
        $vec=[];
        $vect["resultado"]= "ok";
        $vect["mensaje"]= "el nombre del usuario ha sido editado";
        return $vec;
    }

    //insertar

    public function insertar($params){
        $ins="INSERT INTO usuario(nombre_usuario,direccion, fecha_nacimiento, celular,email_usuario,rol, clave) VALUES ('$params->nombre_usuario', '$params->direccion', '$params->fecha_nacimiento', '$params->celular', '$params->email_usuario', '$params->rol', '$params->clave') ";
        mysqli_query($this->conexion, $ins);
        $vec=[];
        $vect["resultado"]= "ok";
        $vect["mensaje"]= "el nuevo campo de registro de usuario ha sido guardado";
        return $vec;
    
    }
    //filtro 
    public function filtro($valor){
        $filtro= "SELECT * FROM usuario WHERE precio LIKE '%$valor%'";
        $res=mysqli_query($this->conexion, $filtro);
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
        }

        return $vec;

    }

}
?>