<?php

class put{

    private $nombreUsuario;
    private $apellidoUsuario;
    private $edadUsuario;
    private $fotoUsuario;
    private $tipoDocumentoUsuario;
    private $numeroDocumentoUsuario;
    private $userId_rol;
    private $idUsuario;

    function __construct( private respuestas $_respuestas, private conexion $conexion){}

    public function updateUser($json){
        
        $datos =json_decode($json,true);
        $error = $this->validarDatos($datos);

        if($error){

            $result = $this->Update();

            if($result){

                return json_encode($this ->_respuestas -> ok_200($result));

            }else{

                return json_encode($this ->_respuestas -> error_500());

            }
        }
            return json_encode($this ->_respuestas -> error_400());
    
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

    private function Update(){
        $query = "UPDATE `usuario` SET 
                `nombreUsuario` = '$this->nombreUsuario', 
                `apellidoUsuario` = ' $this->apellidoUsuario ', 
                `edadUsuario` = '$this->edadUsuario', 
                `fotoUsuario` = '$this->fotoUsuario', 
                `tipoDocumentoUsuario` = '$this->tipoDocumentoUsuario',
                `numeroDocumentoUsuario` = '$this->numeroDocumentoUsuario', 
                `userId_rol` = '$this->userId_rol' 
                WHERE `usuario`.`idUsuario` = $this->idUsuario;";

        $respueta =$this -> conexion -> nonQuery($query);
        if($respueta){
            return $respueta;
        }else{
            return 0;
        }
    }

    
}


?>