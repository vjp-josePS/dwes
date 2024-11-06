<?php
class Connection{
    public static function make(){
        $option=[
            PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',//para que utilice la encriptacióm utf8
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//genera excepciones al producirse errores, asi los podemos capturar
            PDO::ATTR_PERSISTENT=>true
        ];

        try{
            $connection=new PDO('mysql:host=dwes.local;dbname=proyecto;charset=utf8','user','user', $option);
        }catch(PDOException $error){
            die($error->getMessage());//detiene la ejecución del script. El string se muestra.
        }
    }
}
?>