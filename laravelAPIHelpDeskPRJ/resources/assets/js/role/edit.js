$(document).ready(function () {
    $("#permissions").select2();

    var request = buscarPermissoes();
    request.done(function () {
        buscarPermissoes($("#id").val());
    });
});

function buscarPermissoes(role = null) {
    var request = $.ajax({
        url: "/api/permission/",
        method: "GET",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        data: {
            role_id: role
        },
        beforeSend: function () {
            $("#permissions").after("<div class='load_perm spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
        },
        complete: function () {
            $(".load_perm").remove();
        }
    })
    .done(function (json) {
        if (role != null) {
            checarConcedidas(json.data);
        }else{
            $.each(json.data, function (index, el) {
                $("#permissions").append("<option value='" + el.id + "'>" + el.name + "</option>");
            });
        }
    })
    .fail(function (data) {
        alert("ERRO");
        console.log(data);
    });
    return request;
}

function checarConcedidas(concedidas){
    $.each(concedidas, function (index, el) {
        $("#permissions").children("option[value='" + el.id + "']").attr("selected","selected");
    });

    $("#permissions").trigger("change");
}

function salvar(){
    
}