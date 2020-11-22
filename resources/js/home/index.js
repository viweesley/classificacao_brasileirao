const getClassificacao = () => {
    $('.table-classificacao tbody').html('');
    $.get("/classificacao", function( data ) {
        data.forEach(function(clube, key){
            $('.table-classificacao tbody').append(
                `<tr class="${clube.tipoClassificacao}">
                    <td class="clube">
                        <span class="pr-2"> <storng> ${key+1}º </strong> </span>
                        <img src="${clube.esculdo}" style="width:22px;height:22px" >
                        <span class="pl-1">${clube.nome} </span>
                    </td>
                    <td> <strong> ${clube.pontos} </strong> </td>
                    <td> ${clube.jogos} </td>
                    <td> ${clube.vitorias} </td>
                    <td> ${clube.empates} </td>
                    <td> ${clube.derrotas} </td>
                    <td> ${clube.gols_pro} </td>
                    <td> ${clube.gols_contra} </td>
                    <td> ${clube.saldo_gols} </td>
                </tr>`
            );
        });
    });
} 

const adicionarJogo = (form) =>{
    $(form).find('input, select').focusout();
    if($('.is-invalid').length != 0) {
        alert('O preenchimento de todos os campos é obrigatório');
        return false;
    }
    let dados = new FormData(form);
    $.ajax({
        url: $(form).attr('action'),
        type: 'post',
        dataType: 'json',
        data: dados,	
        contentType: false,
        processData: false
    }).done(function(data){
        if(data){
            getClassificacao();
            $('.modal-adicionar-confronto').modal('hide');
        }
    });
}

$(document).ready(function(){
    $('[type=text]').mask('0#');
    getClassificacao();

    $('.adicionar-confronto').click(function(){
        $('#form-adicionar-jogo')[0].reset();
        $('.is-invalid').removeClass('is-invalid');
        $('select option').prop('disabled', false);
        $('.modal-adicionar-confronto').modal('show');
    });

    $('input, select').focusout(function(){
        $(this).removeClass('is-invalid');
        if (!$(this).val()) 
            $(this).addClass('is-invalid');
        else if ( $(this).is('select')){
            $(`select:not([name=${$(this).attr('name')}]) option`).prop('disabled', false);
            $(`select:not([name=${$(this).attr('name')}]) option[value=${$(this).val()}]`).prop('disabled', true); 
        }
    });

    $('#form-adicionar-jogo').submit(function(e){
        e.preventDefault();
        adicionarJogo(this);
    });
});