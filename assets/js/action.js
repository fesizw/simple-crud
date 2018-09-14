function deletar(id) {
    'use strict';
    var r = confirm("Tem certeza que quer deletar o id: " + id + "?");
    if (r === true) {
        location.href = "../action/delete_cliente.php?id=" + id;
    }
}