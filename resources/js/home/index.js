const getClassificacao = () => {
    $.get("http://localhost:8000/classificacao", function( data ) {
        data.forEach(function(clube, key){
            $('.table-classificacao tbody').append(
                `<tr class="${clube.tipoClassificacao}">
                    <td class="clube">
                        <span class="pr-2"> <storng> ${key+1} º </strong> </span>
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
$(document).ready(function(){
    getClassificacao();

    $('.adicionar-confronto').click(function(){
        $('.modal-adicionar-confronto').modal('show');
    });
});