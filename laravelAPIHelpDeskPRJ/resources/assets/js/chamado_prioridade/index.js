var gridPrioridadeChamados;

$(document).ready(chamadoPrioridadeIndexReady = function () {
    $("#status").select2();

    gridPrioridade();

    $("#btnBuscar").on("click", function () {
        gridPrioridadeChamados.draw();
    });

});

function deletar(id) {
    $.ajax({
        url: "/api/chamado_prioridade/" + id,
        method: "DELETE",
        headers: window.axios.defaults.headers.common,
    })
        .done(function (data) {
            alert("Sucesso!");

            gridPrioridadeChamados.draw();
        })
        .fail(function (data) {
            alert("Falha!");
            console.log(data);
        });
}

function gridPrioridade() {
    gridPrioridadeChamados = $("#resultado_chamado_prioridade").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": '/api/chamado_prioridade/',
            "data": function (d) {
                d.nome = $("#nome").val();
                d.codigo = $("#codigo").val();
                d.status = $("#status").val();
            },
            headers: window.axios.defaults.headers.common,
            "dataSrc": function (json) {

                var return_data = [];

                for (var i = 0; i < json.data.length; i++) {
                    var buttonEdit = "<a class='btn btn-sm btn-primary' href='" + json.data[i].links['self-form'] + "'>Editar</a>";
                    var buttonDelete = "<button type='button' class='btn btn-sm btn-danger'  href='#' onclick='deletar(" + json.data[i].id + ")'>Deletar</button>";
                    var status = "<i title='INATIVO' class='material-icons'>remove_circle</i>";

                    if (json.data[i].status == "1") {
                        status = "<i title='ATIVO' class='material-icons'>check_circle</i>";
                    }

                    return_data.push({
                        'id': json.data[i].id,
                        'nome': json.data[i].nome,
                        'codigo': json.data[i].codigo,
                        'status': status,
                        'opcoes': buttonEdit + buttonDelete,
                    });
                    
                }
                return return_data;
            },
        },
        "columns": [
            { "title": "ID", "className": "dt-center", "name": "id", "data": "id" },
            { "title": "PRIORIDADE", "className": "dt-center", "name": "nome", "data": "nome" },
            { "title": "CODIGO", "className": "dt-center", "name": "codigo", "data": "codigo" },
            { "title": "ATIVO", "className": "dt-center", "name": "status", "data": "status" },
            { "title": "OPÇÕES", "className": "dt-center", "name": "opcoes", "data": "opcoes", "sortable": false },
        ],
    });
}