<?php

namespace App\Table;

use App\User\Users;
use PDO;
use Exception;

abstract class Table
{
    protected $pdo;
    protected $table = 'users';
    protected $class = Users::class;

    public function __construct(PDO $pdo)
    {
        if($this->table === null){
            throw new Exception("La class " . get_class($this) . "n'a pas de propriété \$table");
            
        }
        if($this->class === null){
            throw new Exception("La class " . get_class($this) . "n'a pas de propriété \$class");
            
        }
        return $this->pdo = $pdo;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        return $this->pdo->query($sql, PDO::FETCH_CLASS, $this->class)->fetchAll();
    }
}

?>