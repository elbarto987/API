<?php

class post{


    private $nombreUsuario;
    private $apellidoUsuario;
    private $edadUsuario;
    private $fotoUsuario;
    private $tipoDocumentoUsuario;
    private $numeroDocumentoUsuario;
    private $userId_rol;

    function __construct( private respuestas $_respuestas, private conexion $conexion){}
    

    public function NewUser($json){

        $datos = json_decode($json,true);
        $error = $this -> validarDatos($datos);

        if($error){

            $result = $this -> insertUser();

            if($result){
                return json_encode($this ->_respuestas -> ok_200($result));
            }else{
                return json_encode($this ->_respuestas -> error_500());
            }
        }
            
        return json_encode($this ->_respuestas -> error_400());
        
        
    }

    private function insertUser(){
        
        $query = "INSERT INTO `usuario` (
                                            `nombreUsuario`, 
                                            `apellidoUsuario`, 
                                            `edadUsuario`, 
                                            `fotoUsuario`, 
                                            `tipoDocumentoUsuario`, 
                                            `numeroDocumentoUsuario`, 
                                            `userId_rol`)  
        VALUES  
        (
            '$this->nombreUsuario',
            '$this->apellidoUsuario',
            '$this->edadUsuario',
            '$this->fotoUsuario',
            '$this->tipoDocumentoUsuario',
            '$this->numeroDocumentoUsuario',
            '$this->userId_rol')";

        $respueta = $this -> conexion -> nonQueryid($query);
        
        if($respueta){
            return $respueta;
        }else{
            return 0;
        }
    }

    private function validarDatos( $datos ){

        foreach( $datos as $dato => $key ){
            
            if($this -> vacio($dato) || isset($this->$dato)){
                
                return false;
            }
            $this->$dato = $key;
        }

        return true;
    }

    private function vacio( $valor ){
        return (empty($valor) ? true : false );
    }

}


?>