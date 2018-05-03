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
        buscarChamados();
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
    $("#autor_id,#responsavel_id,#analista_id").empty();

    $.ajax({
        url: "/api/user/",
        method: "GET",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            status: [1],
        },
        beforeSend: function () {
            $("#autor_id,#responsavel_id,#analista_id").after("<div class='load_users spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
        },
        complete: function () {
            $(".load_users").remove();
        }
    })
    .done(function (json) {
        $.each(json.data, function (index, el) {
            $("#autor_id,#responsavel_id,#analista_id").append("<option value='" + el.id + "'>" + el.name + "</option>");
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



function buscarChamados () {

    var org_id = [];
    var dep_id = [];
    var svc_id = [];
    var cat_id = [];
    var urg_id = [];
    var pri_id = [];
    var sit_id = [];
    var fee_id = [];
    var analistas = [];
    var responsaveis = [];
    var autores = [];
    
    $.each($("#organizacao_id").val(), function () {
        org_id.push(this);
    });

    $.each($("#departamento_id").val(), function () {
        dep_id.push(this);
    });

    $.each($("#organizacao_id").val(), function () {
        svc_id.push(this);
    });

    $.each($("#organizacao_id").val(), function () {
        cat_id.push(this);
    });

    $.each($("#organizacao_id").val(), function () {
        urg_id.push(this);
    });

    $.each($("#organizacao_id").val(), function () {
        pri_id.push(this);
    });

    $.each($("#organizacao_id").val(), function () {
        sit_id.push(this);
    });

    $.each($("#organizacao_id").val(), function () {
        fee_id.push(this);
    });

    $.each($("#organizacao_id").val(), function () {
        analistas.push(this);
    });

    $.each($("#organizacao_id").val(), function () {
        responsaveis.push(this);
    });

    $.each($("#organizacao_id").val(), function () {
        autores.push(this);
    });

    $.ajax({
        url: "/api/chamado/",
        method: "GET",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            status: [1],
            organizacao_id: org_id,
            departamento_id: dep_id,
            servico_id: svc_id,
            chamado_categoria_id: cat_id,
            chamado_urgencia_id: urg_id,
            chamado_prioridade_id: pri_id,
            chamado_situacao_id: sit_id,
            chamado_feedback_id: fee_id,
            analista_id: analistas,
            responsavel_id: responsaveis,
            autor_id: autores,
            id: $("#id").val(),
            titulo: $("#titulo").val(),
            length: $("#length").val(),

        },
        beforeSend: function () {
            $("#resultado_chamado").before("<div class='load_tick spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
        },
        complete: function () {
            $(".load_tick").remove();
        }
    })
    .done(function (json) {
        $("#resultado_chamado").empty();
        criarCardsChamadosBusca(json);
        console.log(json);
    })
    .fail(function (data) {
        console.log('erro chamado');
        console.log(data);
    });
}

function criarCardsChamadosBusca(json){
    json.data.forEach(function (element, index, array) {

        var card = $("<div class='card card-default mt-5' chamado_id=''></div>");
        var titulo = $("<div class='card-header text-center'></div>");
        var body = $("<div class='card-body'></div>");

        $(card).attr("chamado_id",element.id);
        $(titulo).html(element.titulo);
        $(body).html(element.descricao);
        
        $(card).append(titulo);
        $(card).append(body);

        $("#resultado_chamado").append(card);
        
    });
}


function testeBusca(){


    var card = $("<div class='card card-default'></div>");
    var header = $("<div class='card-header text-center'>Teste</div>");
    var body = $("<div class='card-body'>Teste</div>");
    
    $(card).append(header);
    $(card).append(body);
    
    $("#resultado_chamado").append(card);
}