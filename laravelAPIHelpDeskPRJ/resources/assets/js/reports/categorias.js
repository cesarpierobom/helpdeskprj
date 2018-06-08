$(document).ready(function () {
    $("#organizacao").select2();
    buscarOrganizacoes();

    $("#btnBuscar").on("click", function () {
        gerarRelatorio();
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
            $("#organizacao").after("<div class='load_org spinner_dots'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
        },
        complete: function () {
            $(".load_org").remove();
        }
    })
        .done(function (json) {
            $.each(json.data, function (index, el) {
                $("#organizacao").append("<option value='" + el.id + "'>" + el.nome + "</option>");
            });

        })
        .fail(function (data) {
            alert("ERRO: " + data);
        });
}


function gerarRelatorio() {

    var dadosTabela;

    gridRelatorioCategorias = $("#resultado_relatorio_categorias").DataTable({
        "processing": true,
        "serverSide": true,
        "destroy": true,
        "ajax": {
            "url": '/api/relatorio/categorias/',
            "headers": window.axios.defaults.headers.common,
            "data": function (d) {
                d.organizacao = $("#organizacao").val();
            },
            "dataSrc": function (json) {
                var return_data = [];

                for (var i = 0; i < json.data.length; i++) {

                    return_data.push({
                        'nome': json.data[i].nome,
                        'total': json.data[i].total,
                    });
                }
                dadosTabela = return_data;
                return return_data;
            },
        },
        "initComplete": function () {
            grafico(dadosTabela);
        },
        "columns": [
            { "title": "CATEGORIA", "className": "dt-center", "name": "nome", "data": "nome" },
            { "title": "TOTAL DE CHAMADOS", "className": "dt-center", "name": "total", "data": "total" },
        ],
    });
}

window.chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
};



function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function grafico(dadosTabela) {
    if (typeof canvasgeral != 'undefined') {
        canvasgeral.destroy();
    }

    var graficoNomes = [];
    var graficoTotal = [];
    var graficoCores = [];

    var ctx = $("#canvascategorias");

    dadosTabela.forEach(element => {
        graficoNomes.push(element.nome);
        graficoTotal.push(element.total);

        var r = getRandomInt(0, 255);
        var g = getRandomInt(0, 255);
        var b = getRandomInt(0, 255);

        var cor = 'rgb(' + r + ',' + g + ',' + b + ')';
        graficoCores.push(cor);
    });


    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: graficoTotal,
                backgroundColor: graficoCores,
                label: 'Categorias de Chamados da Organização'
            }],
            labels: graficoNomes,
        },
        options: {
            responsive: true
        }
    };

    var canvascategorias = new Chart(ctx, config);
}