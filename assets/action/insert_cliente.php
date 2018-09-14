<?php

namespace assets\action;

require_once '../percistencia/clientes.php';

use assets\percistencia\clientes;

class insert_cliente {

    private $cliente;

    public function __construct() {
        if (!empty($_POST['nome']) and ! empty($_POST['endereco']) and ! empty($_POST['login']) and ! empty($_POST['senha'])) {
            $this->cliente = new clientes();
            if ($this->cliente->cadastarCli($_POST['nome'], $_POST['endereco'], $_POST['login'], $_POST['senha'])) {
                header("Location: ../../index.php?c=TRUE");
            } else {
                header("Location: ../../index.php?c=FALSE");
            }
        } else {
            header("Location: ../../index.php?c=ERROR");
        }
    }

}

new insert_cliente();
