var gridUser;

$(document).ready(userIndexReady = function () {
    $("#organizacao_id").select2();
    $("#status").select2();

    buscarOrganizacoes();
    gridUser();

    $("#btnBuscar").on("click", function () {
        gridUser.draw();
    });

});

function deletar(id) {
    $.ajax({
        url: "/api/user/" + id,
        method: "DELETE",
        headers: window.axios.defaults.headers.common,
    })
        .done(function (data) {
            alert("Sucesso!");

            gridUser.draw();
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

function gridUser() {
    gridUser = $("#resultado_usuario").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": '/api/user/',
            headers: window.axios.defaults.headers.common,
            "data": function (d) {
                d.nome = $("#nome").val();
                d.login = $("#login").val();
                d.email = $("#email").val();
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
                        'name': json.data[i].name,
                        'last_name': json.data[i].last_name,
                        'email': json.data[i].email,
                        'login': json.data[i].login,
                        'status': status,
                        'opcoes': buttonEdit + buttonDelete,
                    });

                    
                    if (!$.isEmptyObject(json.data[i].organizacao_origem) && json.data[i].organizacao_origem.hasOwnProperty('nome')) {
                        return_data[i]['organizacao_origem'] = json.data[i].organizacao_origem.nome;
                    }else{
                        return_data[i]['organizacao_origem'] = "";
                    }
                    
                    return_data[i]['organizacao_visivel'] = "";

                    if (Array.isArray(json.data[i].organizacao_visivel) && json.data[i].organizacao_visivel.length > 0 && json.data[i].organizacao_visivel[0].hasOwnProperty('nome')) {
                        json.data[i].organizacao_visivel.forEach(element => {
                            return_data[i]['organizacao_visivel'] += " "+element.nome;
                        });
                    }

                }
                return return_data;
            },
        },
        "columns": [
            { "title": "ID", "className": "dt-center", "name": "id", "data": "id" },
            { "title": "OPÇÕES", "className": "dt-center", "name": "opcoes", "data": "opcoes", "sortable": false },
            { "title": "NOME", "className": "dt-center", "name": "name", "data": "name" },
            { "title": "SOBRENOME", "className": "dt-center", "name": "last_name", "data": "last_name" },
            { "title": "LOGIN", "className": "dt-center", "name": "login", "data": "login" },
            { "title": "EMAIL", "className": "dt-center", "name": "email", "data": "email" },
            { "title": "ORGANIZACAO DE ORIGEM", "className": "dt-center", "name": "organizacao_origem", "data": "organizacao_origem" },
            { "title": "ORGANIZACOES VISIVEIS", "className": "dt-center", "name": "organizacao_visivel", "data": "organizacao_visivel" },
            { "title": "ATIVO", "className": "dt-center", "name": "status", "data": "status" },
        ],
    });
}