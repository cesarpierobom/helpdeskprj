$(document).ready(function () {
    $("#permissions").select2();

    buscarPermissoes();

});

function buscarPermissoes() {
    var request = $.ajax({
        url: "/api/permission/",
        method: "GET",
        dataType: "json",
        headers: window.axios.defaults.headers.common,
        beforeSend: function () {
            $("#permissions").after("<div class='load_perm spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
        },
        complete: function () {
            $(".load_perm").remove();
        }
    })
    .done(function (json) {
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
