var gridRoles;

$(document).ready(roleIndexReady = function () {
    carregarGridRoles();

    $("#btnBuscar").on("click", function () {
        gridRoles.draw();
    });

});

function deletar(id) {
    $.ajax({
        url: "/api/role/" + id,
        method: "DELETE",
        headers: window.axios.defaults.headers.common,
    })
        .done(function (data) {
            alert("Sucesso!");

            gridRoles.draw();
        })
        .fail(function (data) {
            alert("Falha!");
            console.log(data);
        });
}

function carregarGridRoles() {
    gridRoles = $("#resultado_role").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": '/api/role/',
            "headers": window.axios.defaults.headers.common,
            "data": function (d) {
                d.name = $("#name").val();
            },
            "dataSrc": function (json) {

                var return_data = [];

                for (var i = 0; i < json.data.length; i++) {
                    var buttonEdit = "<a class='btn btn-sm btn-primary' href='" + json.data[i].links['self-form'] + "'>Editar</a>";
                    var buttonDelete = "<button type='button' class='btn btn-sm btn-danger'  href='#' onclick='deletar(" + json.data[i].id + ")'>Deletar</button>";

                    return_data.push({
                        'id': json.data[i].id,
                        'name': json.data[i].name,
                        'opcoes': buttonEdit + buttonDelete,
                    });
                }
                return return_data;
            },
        },
        "columns": [
            { "title": "ID", "className": "dt-center", "name": "id", "data": "id" },
            { "title": "NOME", "className": "dt-center", "name": "name", "data": "name" },
            { "title": "OPÇÕES", "className": "dt-center", "name": "opcoes", "data": "opcoes", "sortable": false },
        ],
    });
}