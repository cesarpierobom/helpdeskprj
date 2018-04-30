var gridUsers;

$(document).ready(usersIndexReady = function () {
    $("#organizacao_visivel").select2();
    $("#organizacao_origem").select2();
    $("#status").select2();
    $("#perfil").select2();
    
    buscarOrganizacoes();
    gridUsers();

    $("#btnBuscar").on("click", function () {
        gridUsers.draw();
    });

});

function deletar(id) {
    $.ajax({
        url: "/api/users/" + id,
        method: "DELETE",
        headers: window.axios.defaults.headers.common,
    })
        .done(function (data) {
            alert("Sucesso!");

            gridUsers.draw();
        })
        .fail(function (data) {
            alert("Falha!");
            console.log(data);
        });
}

function buscarOrganizacoes() {
    $.ajax({
        url: "/api/organizacao/",
        method: "GET",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            status: [1]
        },
        beforeSend: function () {
            $("#organizacao_id").after("<div class='load_org spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
        },
        complete: function () {
            $(".load_org").remove();
        }
    })
        .done(function (json) {
            $.each(json.data, function (index, el) {
                $("#organizacao_id").append("<option value='" + el.id + "'>" + el.nome + "</option>");
            });
        })
        .fail(function (data) {
            alert("ERRO: " + data);
        });
}

function gridUsers() {
    gridUsers = $("#resultado_users").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": '/api/users/',
            headers: window.axios.defaults.headers.common,
            "data": function (d) {
                d.nome = $("#nome").val();
                d.codigo = $("#codigo").val();
                d.status = $("#status").val();
                d.organizacao_id = $("#organizacao_id").val();
            },
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
            { "title": "NOME", "className": "dt-center", "name": "nome", "data": "nome" },
            { "title": "CODIGO", "className": "dt-center", "name": "codigo", "data": "codigo" },
            { "title": "ATIVO", "className": "dt-center", "name": "status", "data": "status" },
            { "title": "OPÇÕES", "className": "dt-center", "name": "opcoes", "data": "opcoes", "sortable": false },
        ],
    });
}