<?php

namespace assets\action;

require_once '../percistencia/clientes.php';

use assets\percistencia\clientes;

class update_cliente {

    private $cliente;

    public function __construct() {
        if (!empty($_POST['id']) and ! empty($_POST['nome']) and ! empty($_POST['endereco']) and ! empty($_POST['login'])) {
            $this->cliente = new clientes();
            if ($this->cliente->atualizarCli($_POST['id'], $_POST['nome'], $_POST['endereco'], $_POST['login'], empty($_POST['senha']) ? FALSE : $_POST['senha'])) {
                header("Location: ../view/update.php?c=TRUE");
            } else {
                header("Location: ../view/update.php?c=FALSE");
            }
        } else {
            header("Location: ../view/update.php?c=ERROR");
        }
    }

}

new update_cliente();
