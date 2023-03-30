<?php

require_once 'clases/Respuestas.class.php';
require_once 'clases/usuarios/GET.class.php';
require_once 'clases/usuarios/POST.class.php';
require_once 'clases/usuarios/PUT.class.php';
require_once 'clases/usuarios/DELETE.class.php';
require_once 'clases/conexion/conexion.class.php';


$respuesta = new respuestas();
$conexion = new conexion($respuesta);
$get = new GET($conexion);
$post = new POST($respuesta,$conexion);
$put = new PUT($respuesta,$conexion);
$delete = new DELETE($respuesta,$conexion);

$usuario = new usuarios($_SERVER['REQUEST_METHOD'],$respuesta,$get,$post,$put,$delete,$conexion);

class usuarios{

    private $respuesta;

    function  __construct( 
        private $Request,
        private respuestas $_respuestas, 
        private GET $_get, 
        private POST $_post,
        private PUT $_put, 
        private DELETE $_delete,
        private conexion $conexion
        ){  
            if($this -> Request === 'GET'){
                $this -> respuesta = $this -> GET($_GET);
            }
            else if($this -> Request === 'POST'){
                $this -> respuesta = $this -> POST( file_get_contents("php://input") );
            }
            else if($this -> Request === 'PUT'){
                $this -> respuesta = $this -> PUT(file_get_contents("php://input"));
            }
            else if($this -> Request === 'DELETE'){
                $this -> respuesta = $this -> DELETE(file_get_contents("php://input"));
            }
            else {
                $this -> respuesta = $this -> _respuestas -> error_405();
            }
            


            $this -> headers($this -> respuesta);
        }


    private function GET($Request){
        $respuesta = $this -> _get -> Respuesta($Request);
        return (empty($respuesta) ? $this -> _respuestas->error_405() : $respuesta );
    }

    private function POST($Request){
        $datos = $this -> _post->NewUser($Request);
        return $datos;
    }

    private function PUT($Request){
        $datos = $this ->_put->updateUser($Request);
        return $datos;
    }

    private function DELETE($Request){
        $datos = $this -> _delete -> deleteUser($Request);
        return $datos;
    }

    private function headers( $respuesta ){ 
        header('content_Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE,PATCH');
        print_r($respuesta);

    }
}


?>