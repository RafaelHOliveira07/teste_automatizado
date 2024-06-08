<script>

    function initMap() {
        var map = new google.maps.Map(document.getElementById("mapa"), {
            center: { lat: -22.4363, lng: -46.8222 },
            zoom: 15
        });


        var pontosLixeira = JSON.parse("<?php echo addslashes($jsonPontosLixeira); ?>");



        if (Array.isArray(pontosLixeira) && pontosLixeira.length > 0) {
            pontosLixeira.forEach(function (pontoLixeira) {
                // Move a obtenção da cor para dentro da função adicionarMarcadorLixeira
                adicionarMarcadorLixeira(map, pontoLixeira);
            });
        } else {
            console.log('Condição não satisfeita. Nenhum ponto de lixeira disponível.');
        }

        // Adiciona marcador para a empresa
        var pontoEmpresa = <?php echo json_encode($empresa->obterPontoEmpresaParaMapa()); ?>;
        adicionarMarcadorEmpresa(map, pontoEmpresa);
    }

    function adicionarMarcadorLixeira(map, pontoLixeira) {
        //console.log('Adicionando marcador para lixeira:', pontoLixeira);
        if (pontoLixeira.latitude && pontoLixeira.longitude && pontoLixeira.nome) {
            // Adiciona o marcador da lixeira ao mapa
            var corIcone = pontoLixeira.cor;



            var markerLixeira = new google.maps.Marker({
                position: { lat: parseFloat(pontoLixeira.latitude), lng: parseFloat(pontoLixeira.longitude) },
                map: map,
                title: 'Localização: ' + pontoLixeira.nome +
                    ' Capacidade: (Volume: ' + pontoLixeira.volume + ' - Peso: ' + pontoLixeira.peso + ')' +
                    ' Tipo: ' + pontoLixeira.tipo,
                icon: {
                    url: '../img/bin-' + corIcone + '.png', // Corrigido para usar a cor diretamente
                    scaledSize: new google.maps.Size(70, 70),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(20, 40)
                }
            });

            // Adiciona um ouvinte de evento se desejar fazer algo ao clicar no marcador da lixeira
            markerLixeira.addListener('click', function () {
                // Seu código ao clicar no marcador da lixeira...
            });
        }
    }



    function adicionarMarcadorEmpresa(map, pontoEmpresa) {
        // Verifica se há informações válidas sobre a empresa
        if (pontoEmpresa.latitude && pontoEmpresa.longitude && pontoEmpresa.nome) {
            // Adiciona o marcador da empresa ao mapa
            var markerEmpresa = new google.maps.Marker({
                position: { lat: parseFloat(pontoEmpresa.latitude), lng: parseFloat(pontoEmpresa.longitude) },
                map: map,
                title: 'Localização da Empresa: ' + pontoEmpresa.nome,
                icon: {
                    url: '../img/construcao.png',
                    scaledSize: new google.maps.Size(90, 80),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(20, 40)
                }
            });

            // Adiciona um ouvinte de evento se desejar fazer algo ao clicar no marcador da empresa
            markerEmpresa.addListener('click', function () {
                // Seu código ao clicar no marcador da empresa...
            });
        }
    }


</script>