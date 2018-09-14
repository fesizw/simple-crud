<?php

namespace assets\action;

require_once '../percistencia/clientes.php';

use assets\percistencia\clientes;

class delete_cliente {

    private $cliente;

    public function __construct() {
        $this->cliente = new clientes();
        if (!empty($_GET['id'])) {
            if ($this->cliente->deletaCli($_GET['id'])) {
                header("Location: ../view/index.php?c=DTRUE");
            } else {
                header("Location: ../view/index.php?c=DERROR");
            }
        } else {
            header("Location: ../view/index.php?c=DERROR");
        }
    }

}

new delete_cliente();
