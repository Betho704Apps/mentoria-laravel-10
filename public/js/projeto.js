function deleteRegistroPaginacao(rotaUrl, idDoRegistro){
   if(confirm('Deseja excluir o Registro '+idDoRegistro)){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: idDoRegistro,
            },
            beforeSend: function() {
                $.blockUI({
                    message: 'Carregando...',
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
            // console.log('falaha no envio');
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
if(document.getElementById('formatReal') || document.getElementById('valorEditar')){    
    if(document.getElementById('formatReal').value.trim() != ''){
        var campo  = document.getElementById('formatReal');
        if (campo) {
            formatarComoMoedaBrasileira(campo);
        };
    };
            
    document.getElementById('formatReal').addEventListener('input', function() {
        formatarComoMoedaBrasileira(this);
    });
}

// $("#cep").blur(function() {
//     var cep = $(this).val().replace(/\D/g, '');
//     alert(cep);
// })
document.getElementById('cep').addEventListener('input', function() {
    cep_limpo = this.value.replace(/\D/g,'');
    if(cep_limpo.length > 8){
        alert('Cep inválido');
    }
    if(cep_limpo.length == 8){
        $url = "https://viacep.com.br/ws/"+cep_limpo+"/json";
        fetch($url)
            .then(function(response){
                if(response.status == 200) {
                    return response.json();
                } else {
                    throw new Error("Erro na requisição do cep")
                }
            })
            .then(function(data){
                document.getElementById('endereco').value = data.localidade;
                document.getElementById('bairro').value = data.bairro;
                document.getElementById('logradouro').value = data.logradouro;

            })
            .catch(function(error){
                alert('Error..');
            })


    }
});

var formulario = document.querySelector('form');
formulario.addEventListener('submit', function(event) {
    var preloader = document.querySelector('.preloader');
    preloader.style.display = 'flex';
})

function mostraSenha(elemento){
    var exibe = document.getElementById('password_user');
    var tipo = exibe.type;

    if(tipo == 'text'){
        exibe.type = 'password';
        elemento.innerHTML= 'Exibir senha';

        
        // exibe.type = "yyyy";
    } else {
        exibe.type = 'text';
        // exibe.innerHTML = "xxxxx";
        elemento.innerHTML= 'Ocultar senha';

    }

}
