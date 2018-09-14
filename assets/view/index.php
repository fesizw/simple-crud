<?php

namespace assets\view;

require_once '../action/select_cliente.php';

use assets\action\select_cliente;

$cliente = new select_cliente();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>CRUD Client</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
        <script src="../js/action.js"></script>
        <?php
        if (!empty($_GET['c'])) {
            if ($_GET['c'] == 'TRUE') {
                echo '<script type="text/javascript">alert("Cliente cadastrado com sucesso.");</script>';
            } elseif ($_GET['c'] == 'FALSE') {
                echo '<script type="text/javascript">alert("Erro no cadastro.");</script>';
            } elseif ($_GET['c'] == 'ERROR') {
                echo '<script type="text/javascript">alert("Favor preencher todos os campos.");</script>';
            } elseif ($_GET['c'] == 'DERROR') {
                echo '<script type="text/javascript">alert("Favor preencher todos os campos.");</script>';
            } elseif ($_GET['c'] == 'DTRUE') {
                echo '<script type="text/javascript">alert("Cliente deletado com sucesso.");</script>';
            }
        }
        ?>
    </head>
    <body>
        <h1>CRUD CLIENTES</h1>
        <div class="container">
            <div class="crud insert">
                <form name="insert" action="../action/insert_cliente.php" method="POST">
                    <input id="NAME" type="text" name="nome" placeholder="Nome">
                    <input id="ADDRESS" type="text" name="endereco" placeholder="Endereço">
                    <input id="LOGIN" type="text" name="login" placeholder="Login">
                    <input id="PASSWORD" type="password" name="senha" placeholder="Senha">
                    <div class="buttons">
                        <button type="submit" name="insert" class="bt" id="insert" value="TRUE">Inserir</button>
                        <!--                        <button type="submit" name="update" class="bt" id="update" value="TRUE">Atualizar</button>
                                                <button type="submit" name="delete" class="bt" id="delete" value="TRUE">Delete</button>-->
                    </div>
                </form>
            </div>
            <div class="crud table">
                <div class="divTable paleBlueRows">
                    <div class="divTableHeading">
                        <div class="divTableRow">
                            <div class="divTableHead">ID</div>
                            <div class="divTableHead">Nome</div>
                            <div class="divTableHead">Endereço</div>
                            <div class="divTableHead">Login</div>
                            <div class="divTableHead">Senha</div>
                            <div class="divTableHead"> - </div>
                            <div class="divTableHead"> - </div>
                        </div>
                    </div><div class="divTableBody">
                        <?php
                        $allcli = $cliente->callAll_CLIs();
                        $qtdCli = count($allcli);

                        for ($i = 0; $i < $qtdCli; $i++) {
                            $id = $allcli[$i]->ID_CLIENTE;
                            $nome = $allcli[$i]->NOME_CLIENTE;
                            $endereco = $allcli[$i]->ENDERECO_CLIENTE;
                            $login = $allcli[$i]->LOGIN_CLIENTE;
                            echo " 
                            <div class='divTableRow'>
                                <div class='divTableCell'>$id</div>
                                <div class='divTableCell'>$nome</div>
                                <div class='divTableCell'>$endereco</div>                                
                                <div class='divTableCell'>$login</div>
                                <div class='divTableCell'>**********</div>
                                <div class='divTableCell'><a href='./update.php?id=$id' name='update' class='bt' id='update' style=\"text-decoration: none;\" value='$id'>Atualizar</a></div>
                                <div class='divTableCell'><a name='delete' class='bt' id='delete' value='$id' style=\"cursor: pointer;\" onclick=\"deletar($id);\")>Delete</a></div>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>