<?php

namespace assets\percistencia;

require_once '../percistencia/conexao.php';

use assets\percistencia\conexao;

class updates {

    private $conexao;
    private $pdo;
    private $query;

    function __construct() {
        $this->conexao = new conexao();
    }

    public function updateCli($id, $nome, $endereco, $login, $senha) {
        $this->pdo = $this->conexao->getPdo();
        if (empty($senha)) {
            $this->query = "UPDATE `cliente` SET `LOGIN_CLIENTE` = :login, `NOME_CLIENTE` = :nome , `ENDERECO_CLIENTE` = :endereco WHERE `ID_CLIENTE` = :id; ";
            $stmt = $this->pdo->prepare($this->query);
        } else {
            $this->query = "UPDATE `cliente` SET `LOGIN_CLIENTE` = :login,`SENHA_CLIENTE` = MD5(:senha), `NOME_CLIENTE` = :nome , `ENDERECO_CLIENTE` = :endereco WHERE `ID_CLIENTE` = :id; ";
            $stmt = $this->pdo->prepare($this->query);
            $stmt->bindParam(":senha", $senha);
        }
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":endereco", $endereco);
        return $stmt->execute();
    }

}
