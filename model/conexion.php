<?php
    class Database{

        public function __construct(){
            try {
                $this->mysql=$this->conectar();
               // echo 'conexion exitosa';
            } catch (PDOException $excepcion) {
                echo 'Error de conexion' . $excepcion->getMessage();
            } 
        }

        function conectar(){
            
            
            
            //nombre del host, nombre de la database, nombre del usuario, password, charset utf-8

            $hostname ='mysql-dariohimo.alwaysdata.net';
            $database = 'dariohimo_citas_cto';
            $username ='dariohimo_citas';
            $password ='heroku2022*';
            $charset='utf-8';

            //PDO mysqli
            $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
            $pdo =new pdo("mysql:host={$hostname}; dbname={$database};charset{$charset}", $username, $password, $options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        }
    }
