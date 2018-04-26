$(document).ready(function () {
    $("#btnSalvar").on("click", function () {
        salvar();
    });
});

function salvar() {
    $.ajax({
        url: "/api/organizacao/",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            nome: $("#nome").val(),
            codigo: $("#codigo").val(),
            documento: $("#documento").val(),
            razao_social: $("#razao_social").val(),
            status: $("#status").val()
        }
    })
        .done(function (data) {
            alert("Sucesso!");
            window.location.href = "/organizacao";
        })
        .fail(function (data) {
            alert("Falha!");
        });
}