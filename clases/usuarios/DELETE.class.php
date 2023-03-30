<?php

class delete{

    function __construct(private respuestas $_respuestas, private conexion $conexion){}
    
    public function deleteUser($json){
    
        $id=json_decode($json,true);
        
        if(isset($id)){

            $query = "DELETE FROM usuario WHERE idUsuario = ".$id["id"].";";
            $datos = $this -> conexion -> nonQuery($query);
            $datos=json_encode($datos);
            return json_encode($this -> _respuestas -> ok_200($datos));

        }else{

            return json_encode($this -> _respuestas -> error_400());

        }
    }
}


?>