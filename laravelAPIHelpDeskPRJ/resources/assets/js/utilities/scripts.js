/*
    parentNode = Select onde serao inseridos os <options>  EXEMPLO: $("#ch_id")
    registros = json retornado pela api  EXEMPLO : data.usuario
    options = json com as opcoes para a geracao de <options>   EXEMPLO:  {"classes":"um dois tres"}
    selecionados = array de registros que devem aparecer como selecionados   EXEMPLO: ["1","2"]
    options['extra'][indice]['chave'] = nome de atributo customizado.
    options['extra'][indice]['valor'] = valor do atributo
    options['classes'] = adiciona classes ao elemento.
    options['atributos'][indice]['atributoNome'] = nome de atributo customizado.
    options['atributos'][indice]['atributoCampoBanco'] = nome do campo no banco de dados que contem o valor do atributo customizado.
    options['campoChave'] = se refere ao campo "value" do elemento
    options['campoTexto'] = se refere ao label do elemento
    options['campoTextoConcat'][indice][textoString] = concaterna uma string qualquer na label
    options['campoTextoConcat'][indice][campoAPI] = concatena um valor de um campo contido na api, como por exemplo um nome de campo no banco de dados
    options['campoTextoConcat'][indice][separador] = string separadora dos segmentos concatenaveis 
    options['firstValue'] = Adiciona um option de value selecione e texto Selecione
    options['todosNenhum'] = Adiciona um option de value todos e texto TODOS e um option de value nenhum e texto NENHUM
    options['notFound'] = adiciona um option de value "nenhum" e texto "Nenhum Parametrizado Encontrado" caso o campo registros esteja vazio.
*/
function montarDropDown(parentNode, registros, options, selecionados = null){
    if(!$.isEmptyObject(registros)){
        if(options['firstValue'] === true){
            var dropOption = $("<option class='"+options['classes']+"' value='selecione' >Selecione</option>");
            $(parentNode).append(dropOption);
        }else if(options['todosNenhum'] === true){
            var dropOption = $("<option class='"+options['classes']+"' value='todos' >Todos</option>");
            $(parentNode).append(dropOption);
            var dropOption = $("<option class='"+options['classes']+"' value='nenhum' >Nenhum</option>");
            $(parentNode).append(dropOption);
        }
        $.each(registros, montarDropDownEach = function (index, value) {
            var dropOption = $("<option class='"+options['classes']+"' value='"+value[options['campoChave']]+"' ></option>");
            if(options['atributos'] != null){
                $.each(options['atributos'], eachAtributoBancoMontarDropDown = function (indexAttr, valueAttr) {
                    $(dropOption).attr(valueAttr['atributoNome'],value[valueAttr['atributoCampoBanco']]);
                });
            }
            if(options['extra'] != null){
                $.each(options['extra'], eachAtributoCustomizadoMontarDropDown = function (indexAttr, valueAttr) {
                    $(dropOption).attr(valueAttr['chave'],valueAttr['valor']);
                });
            }
            if(selecionados != null){
                if(selecionados.indexOf(value[options['campoChave']]) != -1){
                    $(dropOption).attr('selected','selected');
                }
            }
            if(options['campoTexto'] != null){
                $(dropOption).append(value[options['campoTexto']]);
            }else if (options['campoTextoConcat'] != null){
                var labelfinal = "";
                $.each(options['campoTextoConcat'], eachTextoLabelConcatenavel = function (indexTextoConcatenavel, valueTextoConcatenavel) {
                    if( valueTextoConcatenavel['separador'] != null ){
                        labelfinal += valueTextoConcatenavel['separador'];
                    }
                    if( valueTextoConcatenavel['textoString'] != null ){
                        labelfinal += valueTextoConcatenavel['textoString'];
                    }
                    if( valueTextoConcatenavel['campoAPI'] != null ){
                        labelfinal += value[valueTextoConcatenavel['campoAPI']];
                    }
                });
                $(dropOption).append(labelfinal);
            }
            $(parentNode).append(dropOption);
        });
    }else{
        if(options['notFound'] === true){
            var dropOption = $("<option class='"+options['classes']+"' value='nenhum' selected> Nenhum Parametrizado Encontrado.</option>");
            $(parentNode).append(dropOption);
        }
    }
}


function showModal (header=null, body=null, footer=null) {
    $("#modalPrincipalHeader").empty();
    $("#modalPrincipalBody").empty();
    $("#modalPrincipalFooter").empty();
    
    $("#modalPrincipalHeader").html(header);
    $("#modalPrincipalBody").html(body);
    $("#modalPrincipalFooter").html(footer);

    $("#modalPrincipal").modal();
}



function buscarNotificacoes(page=1){
    var id = Laravel.user.id;

    $.ajax({
        url: "/api/user/" + id + "/notifications",
        method: "GET",
        headers: window.axios.defaults.headers.common,
        data:{
            page:page
        }
    })
        .done(function (data) {
            $("#btnUpdateNotifications").attr("attr_page", "1");
            $("#btnOlderNotifications").attr("attr_page", data.meta.current_page+1);

            if (page==1) {
                $("#container_notificacoes").empty();
            }

            adicionaNotificacoes(data);
        })
        .fail(function (data) {
        })
        .always(function (data) {
            console.log(data);
        });
}

function adicionaNotificacoes(data){
    $.each(data.data, function () {
        var notif = $("<a href='" + this.data.linkweb + "' class='dropdown-item whitespace_wrap'>" + this.data.mensagem + "</a>");
        $("#container_notificacoes").append(notif);
    });
}

$(document).ready(function () {
    buscarNotificacoes();

    $("#btnUpdateNotifications").on("click", function (evento) {
        console.log(evento);
        evento.stopPropagation();
        evento.preventDefault();
        buscarNotificacoes($("#btnUpdateNotifications").attr("attr_page"));
    });

    $("#btnOlderNotifications").on("click", function (evento) {
        console.log(evento);
        evento.stopPropagation();
        evento.preventDefault();
        buscarNotificacoes($("#btnOlderNotifications").attr("attr_page"));
    });


    $("#navbarDropdownMenuLinkNotificacoes").on("click", function () {
        if ($("#badge_notificacoes").length > 0) {
            setTimeout(() => {
                $("#badge_notificacoes").remove();
            }, 5000);
        }
        
        if ($(".badge-notif").length > 0) {
            setTimeout(() => {
                $(".badge-notif").remove();
            }, 5000);
        }
    });
});