<?php

namespace assets\percistencia;

require_once '../percistencia/conexao.php';

use assets\percistencia\conexao;

class inserts {

    private $conexao;
    private $pdo;
    private $query;

    function __construct() {
        $this->conexao = new conexao();
    }

    public function insertCli($nome, $endereco, $login, $senha) {
        $this->pdo = $this->conexao->getPdo();
        $this->query = "INSERT INTO `cliente` (`LOGIN_CLIENTE`, `SENHA_CLIENTE`, `NOME_CLIENTE`, `ENDERECO_CLIENTE`) VALUES (:login, md5(:senha), :nome, :endereco);";
        $stmt = $this->pdo->prepare($this->query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":endereco", $endereco);
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":senha", $senha);
        return $stmt->execute();
    }

}
