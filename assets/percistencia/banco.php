<?php

namespace assets\percistencia;

class banco {

    private $host = "localhost";
    private $usuario = "root";
    private $senha = "aiypwzqp";
    private $banco = "simple-crud";

    private function setHost($host) {
        $this->host = $host;
    }

    public function getHost() {
        return $this->host;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getBanco() {
        return $this->banco;
    }

}
