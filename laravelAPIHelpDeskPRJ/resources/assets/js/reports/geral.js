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


function gerarRelatorio(){

    var arrorganizacao = [];
    var orgs = $("#organizacao").val();

    for (var index = 0; index < orgs.length; index++) {
        arrorganizacao.push(orgs[index]);
    }
    var dadosTabela;

    gridRelatorioGeral = $("#resultado_relatorio_geral").DataTable({
        "processing": true,
        "serverSide": true,
        "destroy": true,
        "ajax": {
            "url": '/api/relatorio/geral/',
            "headers": window.axios.defaults.headers.common,
            "data": function (d) {
                if ($("#periodode").val() != null && $("#periodode").val() != "") {
                    d.periodode = moment($("#periodode").val()).format("YYYY-MM-DD");
                }
                if ($("#periodoate").val() != null && $("#periodoate").val() != "") {
                    d.periodoate = moment($("#periodoate").val()).format("YYYY-MM-DD");
                }
                d.organizacao = arrorganizacao;
            },
            "dataSrc": function (json) {
                var return_data = [];

                for (var i = 0; i < json.data.length; i++) {

                    return_data.push({
                        'nome': json.data[i].nome,
                        'total': json.data[i].total,
                        'abertos': json.data[i].abertos,
                        'abertos_porcentagem': json.data[i].abertos_porcentagem,
                        'encerrados': json.data[i].encerrados,
                        'encerrados_porcentagem': json.data[i].encerrados_porcentagem,
                        'tempo': json.data[i].tempo,
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
            { "title": "NOME", "className": "dt-center", "name": "nome", "data": "nome" },
            { "title": "TOTAL", "className": "dt-center", "name": "total", "data": "total" },
            { "title": "ABERTOS", "className": "dt-center", "name": "abertos", "data": "abertos" },
            { "title": "ABERTOS PORCENTAGEM", "className": "dt-center", "name": "abertos_porcentagem", "data": "abertos_porcentagem" },
            { "title": "ENCERRADOS", "className": "dt-center", "name": "encerrados", "data": "encerrados" },
            { "title": "ENCERRADOS PORCENTAGEM", "className": "dt-center", "name": "encerrados_porcentagem", "data": "encerrados_porcentagem" },
            { "title": "TEMPO", "className": "dt-center", "name": "tempo", "data": "tempo" },
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

function grafico(dadosTabela){
    if (typeof canvasgeral != 'undefined') {
        canvasgeral.destroy();
    }
    console.log(dadosTabela);

    var graficoAbertos = [];
    var graficoEncerrados = [];
    var graficoLabels = [];


    dadosTabela.forEach(element => {
        graficoAbertos.push(element.abertos);
        graficoEncerrados.push(element.encerrados);
        graficoLabels.push(element.nome);
    });

    var ctx = $("#canvasgeral");

    var canvasgeral = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: graficoLabels,
            datasets: [{
                label: 'Abertos',
                backgroundColor: window.chartColors.green,
                data: graficoAbertos
            }, {
                label: 'Encerrados',
                backgroundColor: window.chartColors.red,
                data: graficoEncerrados
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        autoSkip: false
                    },
                    stacked: true,
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        autoSkip: false
                    },
                    stacked: true
                }]
            }
        }
    });
}