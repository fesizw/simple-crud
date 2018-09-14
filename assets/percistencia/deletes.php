<?php

namespace assets\percistencia;

require_once '../percistencia/conexao.php';

use assets\percistencia\conexao;

class deletes {

    private $conexao;
    private $pdo;
    private $query;

    function __construct() {
        $this->conexao = new conexao();
    }

    public function deleteCli($id) {
        $this->pdo = $this->conexao->getPdo();
        $this->query = "DELETE FROM `cliente` WHERE `ID_CLIENTE` = :id;";
        $stmt = $this->pdo->prepare($this->query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

}
