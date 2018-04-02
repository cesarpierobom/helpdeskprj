var gridCategoriasChamados;

$(document).ready( chamadoCategoriaIndexReady = function () {
    gridCategorias();

    $("#organizacao_id").select2();
    $("#status").select2();

    $("#btnBuscar").on("click", function () {
        gridCategoriasChamados.draw();
    });

});

function deletar(id){
    $.ajax({
        url:"/api/chamado_categoria/"+id,
        method:"DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function(){

        },
        complete: function(data){

        },
    })
    .done(function(data){
        console.log('funcionou');
        console.log(data);
        gridCategoriasChamados.draw();
    })
    .fail(function(data){
        console.log('nao funcionou');
        console.log(data);
    });
}

function gridCategorias(){
	gridCategoriasChamados = $("#resultado_categorias_chamados").DataTable({
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url":'/api/chamado_categoria/',
            "data": function(d){
                d.nome = $("#nome").val();
                d.codigo = $("#codigo").val();
                d.status = $("#status").val();
                d.organizacao_id = $("#organizacao_id").val();
            },
            "dataSrc": function (json) {

                var return_data = new Array();

                for(var i=0;i< json.data.length; i++){
                    var buttonEdit = "<a class='btn btn-sm btn-primary' target='_blank' href='"+json.data[i].links['self-form']+"'>Editar</a>";
                    var buttonDelete = "<a class='btn btn-sm btn-danger'  href='#' onclick='deletar("+json.data[i].id+")'>Deletar</a>";

                    return_data.push({
                        'id': json.data[i].id,
                        'nome' : json.data[i].nome,
                        'codigo': json.data[i].codigo,
                        'status': json.data[i].status,
                        'opcoes': buttonEdit+buttonDelete,
                    });
                }
                return return_data;
            },
        },
        "columns":[
        	{"title":"ID", "className":"dt-center", "name":"id", "data":"id"},
        	{"title":"NOME", "className":"dt-center", "name":"nome", "data":"nome"},
        	{"title":"CODIGO", "className":"dt-center", "name":"codigo", "data":"codigo"},
        	{"title":"STATUS", "className":"dt-center", "name":"status", "data":"status"},
            {"title":"OPÇÕES", "className":"dt-center", "name":"opcoes", "data":"opcoes", "sortable":false},
        ],
	});
}