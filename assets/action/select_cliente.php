<?php

namespace assets\action;

require_once '../percistencia/clientes.php';

use assets\percistencia\clientes;

class select_cliente {

    private $cliente;

    function __construct() {
        $this->cliente = new clientes();
    }

    public function call_cli($ID_CLIENTE) {
        return $this->cliente->chamaCli($ID_CLIENTE);
    }

    public function callAll_CLIs() {
        return $this->cliente->chamaTodos_clis();
    }

}

new select_cliente();
