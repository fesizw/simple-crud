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
        return (!empty($return)) ? TRUE : FALSE;
    }

    public function atualizarCli($id, $nome, $endereco, $login, $senha) {
        return $this->update->updateCli($id, $nome, $endereco, $login, $senha);
    }

    public function chamaCli($id) {
        $return = $this->select->simpleSelectOBJ("", "cliente", "ID_CLIENTE = $id");
        return (!empty($return)) ? $return : FALSE;
    }

    public function chamaTodos_clis() {
        $return = $this->select->simpleSelectOBJ("", "cliente", "");
        return (!empty($return)) ? $return : FALSE;
    }

    public function deletaCli($id) {
        return $this->delete->deleteCli($id);
    }

}
