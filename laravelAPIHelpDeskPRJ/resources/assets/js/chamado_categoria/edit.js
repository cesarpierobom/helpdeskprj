$(document).ready(chamadoCategoriaEditDocumentReady = function () {

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
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
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
    var id = $("#id").val();
    $.ajax({
        url: "/api/chamado_categoria/" + id,
        method: "PUT",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: $("#id").val(),
            nome: $("#nome").val(),
            codigo: $("#codigo").val(),
            status: $("#status").val()
        }
    })
        .done(function (data) {
            alert("Sucesso!");
            window.location.href = "/chamado_categoria";
        })
        .fail(function (data) {
            alert("Falha!");
        });
}