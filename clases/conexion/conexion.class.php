<?php

class Conexion{

    private $server;
    private $user;
    private $password;
    private $database;
    private $port;
    private $conexion;
    private $Respuesta;

    function __construct( Respuestas $Respuestas){

        $listaDatos = $this -> datosConexion();

        if($listaDatos !== 'error'){
            foreach($listaDatos as $key => $value){
                $this->server = $value['server'];
                $this->user = $value['user'];
                $this->password = $value['password'];
                $this->database = $value['database'];
                $this->port = $value['port'];
            
            }

            
            try{
                $this->conexion = new mysqli($this->server , $this->user , $this->password , $this->database , $this->port);
                if($this->conexion->connect_errno){
                    throw new  Exception('');
                }else{
                    $this -> Respuesta = $Respuestas -> ok_200('200');
                }

            }catch(Throwable $th){
                $this -> Respuesta = $Respuestas -> error_500();
            }
            
        }else{
            $this -> Respuesta = $Respuestas -> error_500();
        }
        
    }

    public function RespuestaError(  ){
        return $this -> Respuesta;
    }

    private function datosConexion(){
        $direccion = dirname(__FILE__);
        if(file_exists($direccion."/"."config")){
            $jsonData = file_get_contents($direccion."/"."config");
            return json_decode($jsonData,true);
        }
        return 'error';
            
    }

    private function convertirUTF8($array){
        array_walk_recursive($array,function(&$item,$key){
            if(!mb_detect_encoding($item,'utf-8',true)){
                $item=utf8_encode($item);
            }
        });
        return $array;
    }

    public function obtenerDatos($sqlStr){
        $results = $this->conexion->query($sqlStr);
        $resultArray=array();
        if($results!=false ){
            foreach($results as $key){
                $resultArray[] = $key; 
            }
        }

        return $this->convertirUTF8($resultArray);
    }

    public function nonQuery($sqlStr){
        $results = $this->conexion->query($sqlStr);
        return $this->conexion->affected_rows;
    }

    //INSERTS
    public function nonQueryid($sqlStr){
        $results = $this->conexion->query($sqlStr);
        $filas = $this->conexion->affected_rows;
        if($filas >=1){
            return $this->conexion->insert_id;
        }else{
            return 0;
        }
        
    }

    //ENCRIPTAR
    protected function encriptar($string){
        return md5($string);
    }
}

?>