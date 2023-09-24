<html>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href=" {{ asset('css/dashboard.css') }}" rel="stylesheet">


</head>

<body>
    <form>
        <input type="text" id="meuInput">

    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/color-modes.js"></script>
    <script src="/js/projeto.js"></script>


    <script>
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
    </script>
</body>

</html>
