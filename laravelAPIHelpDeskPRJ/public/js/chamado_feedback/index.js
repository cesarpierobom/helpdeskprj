var gridFeedback;

$(document).ready(feedbackIndexReady = function () {
    gridFeedback();

    $("#status").select2();

    $("#btnBuscar").on("click", function () {
        gridFeedback.draw();
    });

});

function deletar(id) {
    $.ajax({
        url: "/api/chamado_feedback/" + id,
        method: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
        .done(function (data) {
            alert("Sucesso!");
            gridFeedback.draw();
        })
        .fail(function (data) {
            alert("Falha!");
            console.log(data);
        });
}

function gridFeedback() {
    gridFeedback = $("#resultado_chamado_feedback").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": '/api/chamado_feedback/',
            "data": function (d) {
                d.nome = $("#nome").val();
                d.codigo = $("#codigo").val();
                d.status = $("#status").val();
            },
            "dataSrc": function (json) {

                var return_data = new Array();

                for (var i = 0; i < json.data.length; i++) {
                    var buttonEdit = "<a class='btn btn-sm btn-primary' target='_blank' href='" + json.data[i].links['self-form'] + "'>Editar</a>";
                    var buttonDelete = "<button type='button' class='btn btn-sm btn-danger'  href='#' onclick='deletar(" + json.data[i].id + ")'>Deletar</button>";

                    return_data.push({
                        'id': json.data[i].id,
                        'nome': json.data[i].nome,
                        'codigo': json.data[i].codigo,
                        'status': json.data[i].status,
                        'opcoes': buttonEdit + buttonDelete,
                    });
                }
                return return_data;
            },
        },
        "columns": [
            { "title": "ID", "className": "dt-center", "name": "id", "data": "id" },
            { "title": "NOME", "className": "dt-center", "name": "nome", "data": "nome" },
            { "title": "CODIGO", "className": "dt-center", "name": "codigo", "data": "codigo" },
            { "title": "STATUS", "className": "dt-center", "name": "status", "data": "status" },
            { "title": "OPÇÕES", "className": "dt-center", "name": "opcoes", "data": "opcoes", "sortable": false },
        ],
    });
}