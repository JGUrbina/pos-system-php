<?php
    class Conexion {
        static function connect() {
            $link = new PDO('mysql:host=localhost;dbname=pos',
                            'root', 
                            'adminroot13141516');

            $link->exec('set names utf8');

            return $link;
        }
    }