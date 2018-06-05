$(document).ready(chamadoSituacaoEditDocumentReady = function () {

    $("#status").select2();


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
    $("#formEditarSituacaoChamado").prepend(dialog);

    $(".is-invalid").removeClass(".is-invalid");
    $(".invalid-feedback").html("");
    var id = $("#id").val();
    $.ajax({
        url: "/api/chamado_situacao/" + id,
        method: "PUT",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            nome: $("#nome").val(),
            codigo: $("#codigo").val(),
            status: $("#status").val(),
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
            window.location.href = "/chamado_situacao";
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
