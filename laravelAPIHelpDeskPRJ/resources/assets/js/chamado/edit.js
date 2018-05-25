$(document).ready(chamadoEditReady = function () {
    buscarInteracoes();

    buscarOrganizacoes();

    if ($("#encerrado").is(":checked")) {
        $("#feedbackrow").removeClass("d-none");
    } else {
        $("#feedbackrow").addClass("d-none");
    }
    
    $("#organizacao_id").select2();
    $("#departamento_id").select2();
    $("#servico_id").select2();
    $("#chamado_categoria_id").select2();
    $("#chamado_urgencia_id").select2();
    $("#chamado_situacao_id").select2();
    $("#chamado_feedback_id").select2();
    $("#chamado_prioridade_id").select2();
    

    $("#organizacao_id").on("change", function () {
        buscarDepartamentos();
        buscarServicos();
        buscarCategorias();
        buscarUrgencia();
        buscarSituacao();
        buscarFeedback();
        buscarPrioridade();
    });

    $("#btnAdicionarInteracao").on("click", function () {
        adicionarInteracao();
    });


    $("#encerrado").on("change", function () {
        if ($("#encerrado").is(":checked")) {
            $("#feedbackrow").removeClass("d-none");
        } else {
            $("#feedbackrow").addClass("d-none");
        }
    });

    $("#btnSalvar").on("click", function () {
        salvar();
    });

});


function salvar() {
    $("#alert").remove();
    var dismiss = $("<button type='button' data-dismiss='alert' class='close'>×</button>");
    var msg = $("<div class='msg'></div>");
    var dialog = $("<div class='alert fade in d-none' id='alert'></div>");

    $(dialog).append(dismiss);
    $(dialog).append(msg);
    $("#formEditarChamado").prepend(dialog);

    $(".is-invalid").removeClass(".is-invalid");
    $(".invalid-feedback").html("");
    var id = $("#id").val();

    $.ajax({
        url: "/api/chamado/"+id,
        method: "PUT",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            organizacao_id: $("#organizacao_id").val(),
            departamento_id: $("#departamento_id").val(),
            servico_id: $("#servico_id").val(),
            chamado_categoria_id: $("#chamado_categoria_id").val(),
            chamado_urgencia_id: $("#chamado_urgencia_id").val(),
            titulo: $("#titulo").val(),
            descricao: $("#descricao").val(),
            encerrado: $("#encerrado").is(":checked")?"1":"0",
            chamado_feedback_id: $("#chamado_feedback_id:visible").val(),
        }
    })
        .done(function (data) {
            console.log(data);

            $(msg).html("Sucesso!");
            $(dialog).alert();
            $(dialog).addClass("alert-success");
            $(dialog).removeClass("d-none");
            setTimeout(function () {
                $(dialog).addClass("show");
            }, 200);
            window.location.href = "/chamado";
        })
        .fail(function (data) {
            console.log(data);
            if (data.status == 422) {
                $.each(data.responseJSON.errors, function (key, value) {
                    $("#" + key).addClass("is-invalid");
                    $("#" + key + "_feedback").html(value);
                });
                $(msg).html(data.responseJSON.message);
                $(dialog).alert();
                $(dialog).addClass("alert-danger");
                $(dialog).removeClass("d-none");

                setTimeout(function () {
                    $(dialog).addClass("show");
                }, 200);
            } else {
                $(msg).html(data.responseJSON.message);
                $(dialog).alert();
                $(dialog).addClass("alert-danger");
                $(dialog).removeClass("d-none");

                setTimeout(function () {
                    $(dialog).addClass("show");
                }, 200);
            }
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
            $("#organizacao_id").val($("#organizacao_id").attr("attr_selected"));
            $("#organizacao_id").trigger("change");
        })
        .fail(function (data) {
            console.log('erro organizacao');
            console.log(data);
        });
}


function buscarDepartamentos() {
    $("#departamento_id").empty();
    var org_id = [];
    org_id.push($("#organizacao_id").val());

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
                $("#departamento_id").val($("#departamento_id").attr("attr_selected"));
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
    org_id.push($("#organizacao_id").val());

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
                $("#servico_id").val($("#servico_id").attr("attr_selected"));
            })
            .fail(function (data) {
                console.log('erro servico');
                console.log(data);
            });
    }
}

function buscarCategorias() {
    $("#chamado_categoria_id").empty();
    var org_id = [];
    org_id.push($("#organizacao_id").val());

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
                $("#chamado_categoria_id").val($("#chamado_categoria_id").attr("attr_selected"));
            })
            .fail(function (data) {
                console.log('erro chamado_categoria');
                console.log(data);
            });
    }
}

function buscarSituacao() {
    $("#chamado_situacao_id").empty();
    var org_id = [];
    org_id.push($("#organizacao_id").val());

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
                $("#chamado_situacao_id").val($("#chamado_situacao_id").attr("attr_selected"));
            })
            .fail(function (data) {
                console.log('erro chamado_situacao');
                console.log(data);
            });
    }
}

function buscarFeedback() {
    $("#chamado_feedback_id").empty();
    var org_id = [];
    org_id.push($("#organizacao_id").val());

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
                $("#chamado_feedback_id").val($("#chamado_feedback_id").attr("attr_selected"));
            })
            .fail(function (data) {
                console.log('erro chamado_feedback');
                console.log(data);
            });
    }
}

function buscarPrioridade() {
    $("#chamado_prioridade_id").empty();
    var org_id = [];
    org_id.push($("#organizacao_id").val());

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
                $("#chamado_prioridade_id").val($("#chamado_prioridade_id").attr("attr_selected"));
            })
            .fail(function (data) {
                console.log('erro chamado_prioridade');
                console.log(data);
            });
    }
}

function buscarUrgencia() {
    $("#chamado_urgencia_id").empty();
    var org_id = [];
    org_id.push($("#organizacao_id").val());

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
                $("#chamado_urgencia_id").val($("#chamado_urgencia_id").attr("attr_selected"));
            })
            .fail(function (data) {
                console.log('erro chamado_urgencia');
                console.log(data);
            });
    }
}

function adicionarInteracao(){
    $("#alert").remove();
    var dismiss = $("<button type='button' data-dismiss='alert' class='close'>×</button>");
    var msg = $("<div class='msg'></div>");
    var dialog = $("<div class='alert fade in d-none' id='alert'></div>");

    $(dialog).append(dismiss);
    $(dialog).append(msg);
    $("#formAdicionarInteracao").prepend(dialog);

    $(".is-invalid").removeClass(".is-invalid");
    $(".invalid-feedback").html("");

    $.ajax({
        url: "/api/interacao/",
        method: "POST",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            chamado_id:$("#id").val(),
            descricao:$("#interacao").val(),
        },
        beforeSend: function () {
            $("#interacao").after("<div class='load_int spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
        },
        complete: function () {
            $(".load_int").remove();
            $("#interacao").val("");
            buscarInteracoes();
        }
    })
    .done(function (json) {
        console.log('sucesso interacao');
    })
    .fail(function (data) {
        if (data.status == 422) {
            $.each(data.responseJSON.errors, function (key, value) {
                $("#" + key).addClass("is-invalid");

                if(key=="descricao"){
                    $("#interacao").addClass("is-invalid");
                    $("#interacao_feedback").html(value);
                }else{
                    $("#" + key + "_feedback").html(value);
                }
            });
            $(msg).html(data.responseJSON.message);
            $(dialog).alert();
            $(dialog).addClass("alert-danger");
            $(dialog).removeClass("d-none");

            setTimeout(function () {
                $(dialog).addClass("show");
            }, 200);
        } else {
            $(msg).html(data.responseJSON.message);
            $(dialog).alert();
            $(dialog).addClass("alert-danger");
            $(dialog).removeClass("d-none");

            setTimeout(function () {
                $(dialog).addClass("show");
            }, 200);
        }

        console.log('erro interacao');
        console.log(data);
    });
}

function buscarInteracoes() {
    var id = $("#id").val();
    grid_interacoes = $("#resultado_interacoes").DataTable({
        "processing": true,
        "serverSide": true,
        "destroy": true,
        "ajax": {
            "url": '/api/chamado/' + id + '/interacoes',
            headers: window.axios.defaults.headers.common,
            "beforeSend": function () {
                $("#resultado_interacoes").before("<div class='load_int spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
            },
            complete: function () {
                $(".load_int").remove();
            },
            "dataSrc": function (json) {
                var return_data = [];

                for (var i = 0; i < json.data.length; i++) {

                    return_data.push({
                        'id': json.data[i].id,
                        'user_id': json.data[i].usuario.name,
                        'created_at': json.data[i].created_at,
                        'descricao': json.data[i].descricao
                    });
                }
                return return_data;
            },
        },
        "columns": [
            { "title": "ID", "className": "dt-center", "name": "id", "data": "id", "sortable":false },
            { "title": "USUARIO", "className": "dt-center", "name": "user_id", "data": "user_id", "sortable":false },
            { "title": "DATA", "className": "dt-center", "name": "created_at", "data": "created_at", "sortable":false },
            { "title": "DESCRICAO", "className": "dt-center", "name": "descricao", "data": "descricao", "width":"80%", "sortable":false},
        ],
    });
}