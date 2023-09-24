function deleteRegistroPaginacao(rotaUrl, idDoRegistro){
   if(confirm('Deseja excluir o produto '+idDoRegistro)){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: idDoRegistro,
            },
            beforeSend: function() {
                $.blockUI({
                    message: 'Carregando',
                    timeout: 2000,
                });
            },
        }).done( function(data) {
            $.unblockUI(); 

            if(data.success == true){
                window.location.reload();
            }else{
                alert('não foi possível excluir');
            };

            console.log('Enviaou ok');
        }).fail( function(data) {
            $.unblockUI();
            console.log('falaha no envio');
            alert('Não foi possível buscar os dados')
        });

   }
}

function formatarComoMoedaBrasileira(input) {
    // 1. Remover todos os caracteres não numéricos, exceto pontos.
    var valor = input.value.replace(/[^0-9.]/g, "");

    // Trata o valor como centavos
    var centavos = parseInt(valor.replace('.', ''), 10) || 0;

    // 3. Formatá-lo para o padrão brasileiro.
    var valorFormatado = (centavos / 100).toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    input.value = valorFormatado;
}

// Uso:
document.getElementById('formatReal').addEventListener('input', function() {
    formatarComoMoedaBrasileira(this);
});