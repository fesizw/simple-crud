<?php

namespace assets\percistencia;

require_once '../percistencia/banco.php';

use assets\percistencia\banco;
use PDO;

class conexao {

    public function __construct() {
        $this->getPdo();
    }

    public function getPdo() {
        $sqlC = new banco();
        try {
            $pdo = new PDO(
                    "mysql:host=" . $sqlC->getHost() . ";dbname=" . $sqlC->getBanco(), $sqlC->getUsuario(), $sqlC->getSenha(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        } catch (Exception $ex) {
            $pdo = $ex;
        }
        return $pdo;
    }

}
