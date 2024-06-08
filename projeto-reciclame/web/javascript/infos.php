



<script>
    function carregarInformacoes() {
        // Obtém o valor selecionado do select
        var idPontoColeta = document.getElementById("pontosSelect").value;

        // Envie o ID do ponto de coleta via AJAX para o script PHP que retorna as informações
        $.ajax({
            type: "POST",
            url: "../html/infos-dash.php",
            data: { idPontoColeta: idPontoColeta },
            success: function(response) {
                // Exiba as informações retornadas pelo script PHP
                $("#informacoes_ponto").html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
    
</script>
