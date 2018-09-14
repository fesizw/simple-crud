<?php

namespace assets\percistencia;

require_once '../percistencia/deletes.php';
require_once '../percistencia/inserts.php';
require_once '../percistencia/selects.php';
require_once '../percistencia/updates.php';

use assets\percistencia\{
    deletes,
    inserts,
    selects,
    updates
};

class clientes {

    private $select;
    private $update;
    private $insert;
    private $delete;

    function __construct() {
        $this->insert = new inserts();
        $this->select = new selects();
        $this->update = new updates();
        $this->delete = new deletes();
    }

    public function cadastarCli($nome, $endereco, $login, $senha) {
        $return = $this->insert->insertCli($nome, $endereco, $login, $senha);
        return (empty($return)) ? FALSE : TRUE;
    }

    public function chamaCli($id) {
        
    }

    public function chamaTodos_clis() {
        $return = $this->select->simpleSelectOBJ("", "cliente", "");
        return (!empty($return)) ? $return : FALSE;
    }

}
