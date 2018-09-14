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
                echo '<script type="text/javascript">alert("Cliente atualizado com sucesso.");</script>';
            } elseif ($_GET['c'] == 'FALSE') {
                echo '<script type="text/javascript">alert("Erro ao atualizar.");</script>';
            } elseif ($_GET['c'] == 'ERROR') {
                echo '<script type="text/javascript">alert("Campos obrigatorios não estão preenchidos.");</script>';
            }
        }
        if (!empty($_GET['id']) or ! empty($_GET['c'])) {
            $cliente = $cliente->call_cli($_GET['id']);
            //var_dump($cliente);
            $id = $cliente[0]->ID_CLIENTE;
            $login = $cliente[0]->LOGIN_CLIENTE;
            $senha = $cliente[0]->SENHA_CLIENTE;
            $nome = $cliente[0]->NOME_CLIENTE;
            $endereco = $cliente[0]->ENDERECO_CLIENTE;
            if (!empty($_GET['c'])) {
                echo '<meta http-equiv="refresh" content=0;url="./index.php">';
            }
        } else {
            header("Location: ./index.php");
        }
        ?>
    </head>
    <body>
        <h1>CRUD CLIENTES</h1>
        <div class="container">
            <div class="crud insert">
                <form name="insert" action="../action/update_cliente.php" method="POST">
                    <input id="ID" type="hidden" name="id" value="<?php echo $id; ?>">
                    <input id="NAME" type="text" name="nome" placeholder="Nome*" value="<?php echo $nome; ?>">
                    <input id="ADDRESS" type="text" name="endereco" placeholder="Endereço*" value="<?php echo $endereco; ?>">
                    <input id="LOGIN" type="text" name="login" placeholder="Login*" value="<?php echo $login; ?>">
                    <input id="PASSWORD" type="password" name="senha" placeholder="Senha" value="">
                    <div class="buttons">
                        <button type="submit" name="update" class="bt" id="insert" value="TRUE">Atualizar Cliente</button>
                        <br><br>
                        <a href="./index.php" class="bt" id="insert" style="background-color: burlywood">voltar</a>
                        <!--                        <button type="submit" name="update" class="bt" id="update" value="TRUE">Atualizar</button>
                                                <button type="submit" name="delete" class="bt" id="delete" value="TRUE">Delete</button>-->
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>