var grid_chamados;
$(document).ready(chamadoIndexReady = function () {
    $("#organizacao_id").select2();
    $("#departamento_id").select2();
    $("#servico_id").select2();
    $("#chamado_categoria_id").select2();
    $("#chamado_urgencia_id").select2();
    $("#chamado_prioridade_id").select2();
    $("#chamado_situacao_id").select2();
    $("#chamado_feedback_id").select2();
    $("#analista_id").select2();
    $("#analista_id").select2();
    $("#autor_id").select2();
    $("#responsavel_id").select2();

    $("#watcher").select2();
    

    $("#status").select2();
    $("#encerrado").select2();
    
    buscarOrganizacoes();
    buscarUsuarios();

    $("#organizacao_id").on("change", function () {
        buscarDepartamentos();
        buscarServicos();
        buscarCategorias();
        buscarSituacao();
        buscarFeedback();
        buscarPrioridade();
        buscarUrgencia();
    });

    $("#btnBuscar").on("click", function () {
        gridChamados();
    });

});

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
        console.log('erro organizacao');
        console.log(data);
    });
}

function buscarDepartamentos() {
    $("#departamento_id").empty();
    var org_id = [];

    $.each($("#organizacao_id").val(),function(){
        org_id.push(this);
    });

    if (org_id.length > 0) {
        $.ajax({
            url: "/api/departamento/",
            method: "GET",
            dataType: "json",
            headers: window.axios.defaults.headers.common,
            data: {
                status: [1],
                organizacao_id: org_id
            },
            beforeSend: function () {
                $("#departamento_id").after("<div class='load_dep spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            },
            complete: function () {
                $(".load_dep").remove();
            }
        })
        .done(function (json) {
            $.each(json.data, function (index, el) {
                $("#departamento_id").append("<option value='" + el.id + "'>" + el.nome + "</option>");
            });
        })
        .fail(function (data) {
            console.log('erro departamento');
            console.log(data);
        });
    }
}

function buscarServicos() {
    $("#servico_id").empty();
    var org_id = [];

    $.each($("#organizacao_id").val(), function () {
        org_id.push(this);
    });

    if (org_id.length > 0) {
        $.ajax({
            url: "/api/servico/",
            method: "GET",
            dataType: "json",
            headers: window.axios.defaults.headers.common,
            data: {
                status: [1],
                organizacao_id: org_id
            },
            beforeSend: function () {
                $("#servico_id").after("<div class='load_svc spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            },
            complete: function () {
                $(".load_svc").remove();
            }
        })
        .done(function (json) {
            $.each(json.data, function (index, el) {
                $("#servico_id").append("<option value='" + el.id + "'>" + el.nome + "</option>");
            });
        })
        .fail(function (data) {
            console.log('erro servico');
            console.log(data);
        });
    }
}

function buscarCategorias(){
    $("#chamado_categoria_id").empty();
    var org_id = [];

    $.each($("#organizacao_id").val(), function () {
        org_id.push(this);
    });

    if (org_id.length > 0) {
        $.ajax({
            url: "/api/chamado_categoria/",
            method: "GET",
            dataType: "json",
            headers: window.axios.defaults.headers.common,
            data: {
                status: [1],
                organizacao_id: org_id
            },
            beforeSend: function () {
                $("#chamado_categoria_id").after("<div class='load_cat spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            },
            complete: function () {
                $(".load_cat").remove();
            }
        })
        .done(function (json) {
            $.each(json.data, function (index, el) {
                $("#chamado_categoria_id").append("<option value='" + el.id + "'>" + el.nome + "</option>");
            });
        })
        .fail(function (data) {
            console.log('erro chamado_categoria');
            console.log(data);
        });
    }
}

function buscarUsuarios(){
    $("#autor_id,#responsavel_id,#analista_id,#watcher").empty();

    $.ajax({
        url: "/api/user/",
        method: "GET",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            status: [1],
        },
        beforeSend: function () {
            $("#autor_id,#responsavel_id,#analista_id,#watcher").after("<div class='load_users spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
        },
        complete: function () {
            $(".load_users").remove();
        }
    })
    .done(function (json) {
        $.each(json.data, function (index, el) {
            $("#autor_id,#responsavel_id,#analista_id,#watcher").append("<option value='" + el.id + "'>" + el.name + "</option>");
        });
    })
    .fail(function (data) {
        console.log('erro users');
        console.log(data);
    });
    
}

function buscarSituacao(){
    $("#chamado_situacao_id").empty();
    var org_id = [];

    $.each($("#organizacao_id").val(), function () {
        org_id.push(this);
    });

    if (org_id.length > 0) {
        $.ajax({
            url: "/api/chamado_situacao/",
            method: "GET",
            dataType: "json",
            headers: window.axios.defaults.headers.common,
            data: {
                status: [1],
                organizacao_id: org_id
            },
            beforeSend: function () {
                $("#chamado_situacao_id").after("<div class='load_status spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            },
            complete: function () {
                $(".load_status").remove();
            }
        })
        .done(function (json) {
            $.each(json.data, function (index, el) {
                $("#chamado_situacao_id").append("<option value='" + el.id + "'>" + el.nome + "</option>");
            });
        })
        .fail(function (data) {
            console.log('erro chamado_situacao');
            console.log(data);
        });
    }
}

function buscarFeedback(){
    $("#chamado_feedback_id").empty();
    var org_id = [];

    $.each($("#organizacao_id").val(), function () {
        org_id.push(this);
    });

    if (org_id.length > 0) {
        $.ajax({
            url: "/api/chamado_feedback/",
            method: "GET",
            dataType: "json",
            headers: window.axios.defaults.headers.common,
            data: {
                status: [1],
                organizacao_id: org_id
            },
            beforeSend: function () {
                $("#chamado_feedback_id").after("<div class='load_feedback spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            },
            complete: function () {
                $(".load_feedback").remove();
            }
        })
        .done(function (json) {
            $.each(json.data, function (index, el) {
                $("#chamado_feedback_id").append("<option value='" + el.id + "'>" + el.nome + "</option>");
            });
        })
        .fail(function (data) {
            console.log('erro chamado_feedback');
            console.log(data);
        });
    }
}

function buscarPrioridade(){
    $("#chamado_prioridade_id").empty();
    var org_id = [];

    $.each($("#organizacao_id").val(), function () {
        org_id.push(this);
    });

    if (org_id.length > 0) {
        $.ajax({
            url: "/api/chamado_prioridade/",
            method: "GET",
            dataType: "json",
            headers: window.axios.defaults.headers.common,
            data: {
                status: [1],
                organizacao_id: org_id
            },
            beforeSend: function () {
                $("#chamado_prioridade_id").after("<div class='load_pri spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            },
            complete: function () {
                $(".load_pri").remove();
            }
        })
        .done(function (json) {
            $.each(json.data, function (index, el) {
                $("#chamado_prioridade_id").append("<option value='" + el.id + "'>" + el.nome + "</option>");
            });
        })
        .fail(function (data) {
            console.log('erro chamado_prioridade');
            console.log(data);
        });
    }
}

function buscarUrgencia(){
    $("#chamado_urgencia_id").empty();
    var org_id = [];

    $.each($("#organizacao_id").val(), function () {
        org_id.push(this);
    });

    if (org_id.length > 0) {
        $.ajax({
            url: "/api/chamado_urgencia/",
            method: "GET",
            dataType: "json",
            headers: window.axios.defaults.headers.common,
            data: {
                status: [1],
                organizacao_id: org_id
            },
            beforeSend: function () {
                $("#chamado_urgencia_id").after("<div class='load_urg spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            },
            complete: function () {
                $(".load_urg").remove();
            }
        })
        .done(function (json) {
            $.each(json.data, function (index, el) {
                $("#chamado_urgencia_id").append("<option value='" + el.id + "'>" + el.nome + "</option>");
            });
        })
        .fail(function (data) {
            console.log('erro chamado_urgencia');
            console.log(data);
        });
    }
}


function gridChamados() {

    grid_chamados = $("#resultado_chamados").DataTable({
        "processing": true,
        "serverSide": true,
        "destroy":true,
        "order":[['1','asc']],
        "ajax": {
            "url": '/api/chamado/',
            headers: window.axios.defaults.headers.common,
            "data": function (d) {
                d.organizacao_id = $("#organizacao_id").val();
                d.departamento_id = $("#departamento_id").val();
                d.servico_id = $("#servico_id").val();
                d.chamado_categoria_id = $("#chamado_categoria_id").val();
                d.chamado_urgencia_id = $("#chamado_urgencia_id").val();
                d.chamado_prioridade_id = $("#chamado_prioridade_id").val();
                d.chamado_situacao_id = $("#chamado_situacao_id").val();
                d.chamado_feedback_id = $("#chamado_feedback_id").val();
                d.analista_id = $("#analista_id").val();
                d.responsavel_id = $("#responsavel_id").val();
                d.autor_id = $("#autor_id").val();
                d.id = $("#id").val();
                d.titulo = $("#titulo").val();
                d.status = $("#status").val();
                d.encerrado = $("#encerrado").val();
            },
            // "beforeSend": function () {
            //     $("#resultado_chamados").before("<div class='load_tick spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            // },
            // complete: function () {
            //     $(".load_tick").remove();
            // },
            "dataSrc": function (json) {

                var return_data = [];

                for (var i = 0; i < json.data.length; i++) {
                    // var buttonEdit = "<a class='btn btn-sm btn-primary' href='" + json.data[i].links['self-form'] + "'>Editar</a>";
                    // var buttonDelete = ""; //"<button type='button' class='btn btn-sm btn-danger'  href='#' onclick='deletar(" + json.data[i].id + ")'>Deletar</button>";
                    var buttonVisualizar = "<a class='btn btn-sm btn-primary' href='" + json.data[i].links['self'] + "'>Visualizar</a>";
                    var buttonWatch = "<a class='btn btn-sm btn-success' onclick=''>Acompanhar</a>";
                    var status = "<i title='INATIVO' class='material-icons'>remove_circle</i>";

                    if (json.data[i].status == "1") {
                        status = "<i title='ATIVO' class='material-icons'>check_circle</i>";
                    }

                    return_data.push({
                        'id': json.data[i].id,
                        'titulo': json.data[i].titulo,
                        'opcoes': buttonVisualizar + buttonWatch,
                    });

                    if (!$.isEmptyObject(json.data[i].organizacao) && json.data[i].organizacao.hasOwnProperty('nome')) {
                        return_data[i]['organizacao'] = json.data[i].organizacao.nome;
                    } else {
                        return_data[i]['organizacao'] = "";
                    }

                    if (!$.isEmptyObject(json.data[i].chamado_situacao) && json.data[i].chamado_situacao.hasOwnProperty('nome')) {
                        return_data[i]['situacao'] = json.data[i].chamado_situacao.nome;
                    } else {
                        return_data[i]['situacao'] = "";
                    }

                    if (!$.isEmptyObject(json.data[i].chamado_categoria) && json.data[i].chamado_categoria.hasOwnProperty('nome')) {
                        return_data[i]['categoria'] = json.data[i].chamado_categoria.nome;
                    } else {
                        return_data[i]['categoria'] = "";
                    }

                    if (!$.isEmptyObject(json.data[i].autor) && json.data[i].autor.hasOwnProperty('login')) {
                        return_data[i]['autor'] = json.data[i].autor.login;
                    } else {
                        return_data[i]['autor'] = "";
                    }

                    if (!$.isEmptyObject(json.data[i].analista) && json.data[i].analista.hasOwnProperty('login')) {
                        return_data[i]['analista'] = json.data[i].analista.login;
                    } else {
                        return_data[i]['analista'] = "";
                    }

                    if (!$.isEmptyObject(json.data[i].responsavel) && json.data[i].responsavel.hasOwnProperty('login')) {
                        return_data[i]['responsavel'] = json.data[i].responsavel.login;
                    } else {
                        return_data[i]['responsavel'] = "";
                    }
                }
                return return_data;
            },
        },
        "columns": [
            { "title": "OPÇÕES", "className": "dt-center", "name": "opcoes", "data": "opcoes", "sortable": false },
            { "title": "ID", "className": "dt-center", "name": "id", "data": "id" },
            { "title": "TITULO", "className": "dt-center", "name": "titulo", "data": "titulo" },
            { "title": "CATEGORIA", "className": "dt-center", "name": "categoria", "data": "categoria" },
            { "title": "SITUAÇÃO", "className": "dt-center", "name": "situacao", "data": "situacao" },
            { "title": "ORGANIZAÇÃO", "className": "dt-center", "name": "organizacao", "data": "organizacao" },
            { "title": "AUTOR", "className": "dt-center", "name": "autor", "data": "autor" },
            { "title": "ANALISTA", "className": "dt-center", "name": "analista", "data": "analista" },
            { "title": "RESPONSAVEL", "className": "dt-center", "name": "responsavel", "data": "responsavel" },
        ],
    });
}
