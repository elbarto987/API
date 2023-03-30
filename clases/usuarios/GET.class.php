<?php

class GET {

    function __construct(private conexion $conexion){
    }
    
    public function Respuesta( $valor ){
        
        if(isset($valor['page'])){
            
            return $this -> page();
        
        }
        if(isset($valor['id'])){
            
            return  $this -> id($valor['id']);
        
        }
        if(isset($valor['filtro']) && isset($valor['parametro'])){
            
            return $this -> filtro($_GET['filtro'],$_GET['parametro']);
        
        }
        if(isset($valor['parametro'])){
            
            return $this -> Allfiltro( $valor['parametro']);
        
        }

        return '';
    }

    private function page(){
    
        $query = "SELECT * FROM usuario";
        $datos = $this -> conexion -> obtenerDatos($query);
        $datos=json_encode($datos);
        return $datos;

    }

    private function id($id){
        $query = "SELECT * FROM usuario WHERE idUsuario = $id";
        $datos = $this -> conexion -> obtenerDatos($query);
        $datos=json_encode($datos);
        return $datos;
    }

    private function filtro($filtro,$parametro){
        $query = "SELECT * FROM usuario WHERE $filtro LIKE  '%$parametro%'";
        $datos = $this -> conexion -> obtenerDatos($query);
        $datos=json_encode($datos);
        return $datos;
    }

    private function Allfiltro($parametro){
        $query = "SELECT * FROM usuario WHERE 
                nombreUsuario LIKE  '%$parametro%' or 
                apellidoUsuario LIKE  '%$parametro%' or
                edadUsuario LIKE  '%$parametro%' or
                fotoUsuario LIKE  '%$parametro%' or
                tipoDocumentoUsuario LIKE  '%$parametro%' or
                numeroDocumentoUsuario LIKE  '%$parametro%' or
                userId_rol LIKE  '%$parametro%'
                ";

        $datos = $this -> conexion -> obtenerDatos($query);
        $datos=json_encode($datos);
        return $datos;
    }
}

?>