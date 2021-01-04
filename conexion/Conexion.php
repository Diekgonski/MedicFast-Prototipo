<?php

class Conexion {


        public function getConnection(){
            $conexion = new PDO("mysql:host=localhost;dbname=medicfast", "root", "");

            return $conexion;
        }
    }  
 