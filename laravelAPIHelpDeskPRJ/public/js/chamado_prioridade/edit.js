$(document).ready(function () {
    $("#btnSalvar").on("click", function () {
        salvar();
    });
});

function salvar() {
    var id = $("#id").val();
    $.ajax({
        url: "/api/chamado_prioridade/" + id,
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
            window.location.href = "/chamado_prioridade";
        })
        .fail(function (data) {
            alert("Falha!");
        });
}