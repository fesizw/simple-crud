<?php

namespace assets\percistencia;

require_once '../percistencia/conexao.php';

use assets\percistencia\conexao;
use PDO;

class selects {

    private $conexao;
    private $pdo;
    private $query;

    function __construct() {
        $this->conexao = new conexao();
    }

    public function simpleSelectOBJ($campos, $table, $filtro) {
        $this->pdo = $this->conexao->getPdo();
        empty($campos) ? $campos = "*" : $campos = $campos;
        empty($filtro) ? $filtro = "1 = 1" : $filtro = $filtro;
        $this->query = "SELECT $campos FROM `$table` WHERE $filtro";
        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute();
        $return = $stmt->fetchAll(PDO::FETCH_OBJ);
        return (empty($return)) ? FALSE : $return;
    }

}
