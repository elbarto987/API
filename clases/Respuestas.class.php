<?php

require_once 'clases\conexion\conexion.class.php';


class Respuestas{

    public $response = [
        'status'=> 'ok',
        'result' => array()
    ];

    public function error_405(){
        $this->response['status'] = 'error';
        $this->response['result'] = array(
            'error' => '405',
            'error_msg' => 'Metodo no permitido'
        );
        return json_encode($this->response);
    }
    
    public function error_406($string="Datos incorrectos"){
        $this->response['status'] = 'error';
        $this->response['result'] = array(
            'error' => '200',
            'error_msg' => $string
        );
        return json_encode($this->response);
    }
    
    public function error_400(){
        $this->response['status'] = 'error';
        $this->response['result'] = array(
            'error' => '400',
            'error_msg' => "Datos  incompletos o con formato incorrecto"
        );
        return json_encode($this->response);
    }

    public function error_500($string="Error interno en el servidor"){
        $this->response['status'] = 'error';
        $this->response['result'] = array(
            'error' => '500',
            'error_msg' => $string
        );
        return json_encode($this->response);
    }

    public function error_401($string="No autorizado, Token invalido"){
        $this->response['status'] = 'error';
        $this->response['result'] = array(
            'error' => '401',
            'error_msg' => $string
        );
        return json_encode($this->response);
    }

    public function ok_200($respuesta){
        $this->response['status'] = 'ok';
        $this->response['result'] = array(
            "msg" => $respuesta
        );
        return json_encode($this->response);
    }
}


?>