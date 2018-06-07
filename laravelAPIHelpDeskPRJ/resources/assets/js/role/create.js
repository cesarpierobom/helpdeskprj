$(document).ready(function () {
    $("#permissions").select2();
    $("#guard_name").select2();

    buscarPermissoes($("#guard_name").val());

    $("#guard_name").on("change", function () {
        buscarPermissoes($("#guard_name").val());
    });


    $("#btnTodos").on("click", function () {
        $("#permissions option").prop("selected", true);
        $("#permissions").trigger("change");
    });

    $("#btnNenhum").on("click", function () {
        $("#permissions option:selected").prop("selected", false);
        $("#permissions").trigger("change");
    });


    $("#btnSalvar").on("click", function () {
        salvar();
    });

    $("#btnResetarCadastro").on("click", function () {
        $("#permissions option:selected").prop("selected", false);
        $("#permissions").trigger("change");
    });


});

function buscarPermissoes(guard = null) {
    var request = $.ajax({
        url: "/api/permission/",
        method: "GET",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data:{
            guard_name: guard,
        },
        beforeSend: function () {
            $("#permissions").after("<div class='load_perm spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
        },
        complete: function () {
            $(".load_perm").remove();
        }
    })
    .done(function (json) {
        $("#permissions").empty();
        $.each(json.data, function (index, el) {
            $("#permissions").append("<option value='" + el.id + "'>" + el.name + "</option>");
        });
    })
    .fail(function (data) {
        alert("ERRO");
        console.log(data);
    });
    return request;
}


function salvar() {
    $("#alert").remove();
    var dismiss = $("<button type='button' data-dismiss='alert' class='close'>×</button>");
    var msg = $("<div class='msg'></div>");
    var dialog = $("<div class='alert fade in d-none' id='alert'></div>");

    $(dialog).append(dismiss);
    $(dialog).append(msg);
    $("#formCadastrarPerfil").prepend(dialog);

    $(".is-invalid").removeClass(".is-invalid");
    $(".invalid-feedback").html("");
    $.ajax({
        url: "/api/role/",
        method: "POST",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            name: $("#name").val(),
            permissions: $("#permissions").val(),
            guard_name: $("#guard_name").val(),
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
            window.location.href = "/role";
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