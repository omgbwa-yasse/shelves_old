<?php
 abstract class Connexion{
    private static $cnx;

    private static function setCnx(){
        self::$cnx = new PDO(
            "mysql:host=localhost;dbname=dbms;charset=utf8",
            "root", "");
            self::$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }
            protected function getCnx(){
                if(self::$cnx===null){
                    self::setCnx();
                }
                return self::$cnx;
            }




    }
?>