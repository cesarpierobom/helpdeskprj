$(document).ready(usuarioGrupoCreateDocumentReady = function () {

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
        })
        .fail(function (data) {
            alert("ERRO: " + data);
        });
}

function salvar() {
    $.ajax({
        url: "/api/usuario_grupo/",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            nome: $("#nome").val(),
            codigo: $("#codigo").val(),
            status: $("#status").val(),
            organizacao_id: $("#organizacao_id").val()
        }
    })
        .done(function (data) {
            alert("Sucesso!");
            window.location.href = "/usuario_grupo";
        })
        .fail(function (data) {
            alert("Falha!");
        });
}