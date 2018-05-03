$(document).ready(chamadoPrioridadeEditDocumentReady = function () {

    $("#organizacao_id").select2();
    $("#status").select2();

    buscarOrganizacoes();

    $("#btnSalvar").on("click", function () {
        salvar();
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
            $("#organizacao_id").val($("#organizacao_id").attr("attr_selected"));
        })
        .fail(function (data) {
            alert("ERRO: " + data);
        });
}

function salvar() {
    $("#alert").remove();
    var dismiss = $("<button type='button' data-dismiss='alert' class='close'>×</button>");
    var msg = $("<div class='msg'></div>");
    var dialog = $("<div class='alert fade in d-none' id='alert'></div>");

    $(dialog).append(dismiss);
    $(dialog).append(msg);
    $("#formEditarPrioridadeChamado").prepend(dialog);

    $(".is-invalid").removeClass(".is-invalid");
    $(".invalid-feedback").html("");
    var id = $("#id").val();
    $.ajax({
        url: "/api/chamado_prioridade/" + id,
        method: "PUT",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            nome: $("#nome").val(),
            codigo: $("#codigo").val(),
            status: $("#status").val(),
            organizacao_id: $("#organizacao_id").val(),
            padrao: $("#padrao:checked").val()
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
            window.location.href = "/chamado_prioridade";
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
