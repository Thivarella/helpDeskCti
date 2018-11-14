function today() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    return now.getFullYear()+"-"+(month)+"-"+(day);
}

function openModal(user,chamado){
    $('#modalChamado').modal('show');
    if(chamado == null || chamado == undefined){
        $('#inputChamado').val("");
        $('#inputRa').val(user.ra);
        $('#inputEmail').val(user.email);
        $('#inputStatus').val(1).prop( "disabled", true );
        $('#inputTipo').val('Selecione').prop( "disabled", false );
        $('#inputSala').val('Selecione').prop( "disabled", false );
        $('#inputSolicitante').val(user.nome);
        $('#inputDescricao').val("").prop( "disabled", false );
        $('#inputTecnico').val("").prop( "disabled", true );
        $('#inputDatachamado').val(today());
        $('#realizarInsert').text("Abrir Chamado").prop( "disabled", false );
        $('#inputDatafinal').val("").prop( "disabled", true );
    }else{
        $('#inputChamado').val(chamado.id);
        $('#inputRa').val(chamado.solicitante_id.ra);
        $('#inputEmail').val(chamado.solicitante_id.email);
        if(user.is_cti == 1){
            $('#inputStatus').val(chamado.status_id.id).prop( "disabled", false );
            $('#realizarInsert').text("Atualizar Chamado");
        }else{
            $('#inputStatus').val(chamado.status_id.id).prop( "disabled", true );
            $('#realizarInsert').text("Aguardando...").prop( "disabled", true );
        }
        $('#inputTipo').val(chamado.tipo_id.id).prop( "disabled", true );
        $('#inputSala').val(chamado.sala_id.id).prop( "disabled", true );
        $('#inputDescricao').val(chamado.descricao).prop( "disabled", true );
        $('#inputSolicitante').val(chamado.solicitante_id.nome);
        $('#inputTecnico').val(chamado.tecnico_id != null?chamado.tecnico_id.nome:user.nome).prop( "disabled", true );
        $('#inputDatachamado').val(chamado.data_abertura);
        $('#inputDatafinal').val("").prop( "disabled", true );
        if(chamado.status_id.id != 1 && chamado.status_id.id != 3 ){
            $('#inputDatafinal').val(chamado.data_resolucao).prop( "disabled", true );
        }
    }
}

function habiliteToSend() {
    $('#inputChamado').prop( "disabled", false );
    $('#inputRa').prop( "disabled", false );
    $('#inputEmail').prop( "disabled", false );
    $('#inputStatus').prop( "disabled", false );
    $('#inputTipo').prop( "disabled", false );
    $('#inputSala').prop( "disabled", false );
    $('#inputSolicitante').prop( "disabled", false );
    $('#inputDescricao').prop( "disabled", false );
    $('#inputTecnico').prop( "disabled", false );
    $('#inputDatachamado').prop( "disabled", false );
    if($('#inputStatus').val()!= 1 && $('#inputStatus').val()!= 3 ){
        $('#inputDatafinal').val(today()).prop( "disabled", false );
    }
}