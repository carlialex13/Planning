<?php

namespace App\Data;

use PDO;

class Connection
{
    
    /**
     * getPDO : Génére un rapport d'erreur et renvoi une exception
     *
     * @return PDO
     */
    public static function getPDO(): PDO
    {
        return new PDO('mysql:dbname=planning;host=127.0.0.1', 'root','root', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

}