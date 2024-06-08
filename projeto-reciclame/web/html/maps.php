<script>
    var map;
    var minhaLatitude;
    var minhaLongitude;
    var infoWindow;
    var directionsService;
    var directionsRenderer;

    function calcularDistancia(lat1, lon1, lat2, lon2) {

        var raioTerra = 6371; // Raio da Terra em quilômetros
        var dLat = (lat2 - lat1) * (Math.PI / 180);
        var dLon = (lon2 - lon1) * (Math.PI / 180);
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var distancia = raioTerra * c; // Distância em quilômetros
        return distancia;
    }
    function calcularRota(origemLat, origemLng, destinoLat, destinoLng) {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        var request = {
            origin: new google.maps.LatLng(origemLat, origemLng),
            destination: new google.maps.LatLng(destinoLat, destinoLng),
            travelMode: google.maps.TravelMode.DRIVING
        };
        b
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
            } else {
                alert('Não foi possível calcular a rota. Erro: ' + status);
            }
        });
    }

    function mostrarLocalizacaoNoMapa(lat, lng) {

        var minhaLocalizacao = { lat: lat, lng: lng };

        var marker = new google.maps.Marker({
            position: minhaLocalizacao,
            map: map,
            title: 'Minha Localização',
            icon: {
                url: '../img/mapas-e-bandeiras.png',
                scaledSize: new google.maps.Size(40, 40),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(20, 40)
            }
        });

        // Opcional: Você pode adicionar um InfoWindow para mostrar informações sobre sua localização ao clicar no marcador
        var infoWindow = new google.maps.InfoWindow({
            content: 'Minha Localização Atual'
        });

        marker.addListener('click', function () {
            infoWindow.open(map, marker);
        });

        // Opcional: Centralize o mapa na sua localização atual
        map.setCenter(minhaLocalizacao);
    }

    function obterLocalizacaoAtual() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                minhaLatitude = position.coords.latitude;
                minhaLongitude = position.coords.longitude;

                // Chame uma função para mostrar sua localização no mapa
                mostrarLocalizacaoNoMapa(minhaLatitude, minhaLongitude);
                // Chame uma função para carregar os pontos do banco de dados e calcular a distância
                carregarPontosECalcularDistancia(minhaLatitude, minhaLongitude);
            });
        } else {
            alert("Geolocalização não é suportada pelo seu navegador.");
        }
    }

    function carregarPontosECalcularDistancia(minhaLatitude, minhaLongitude) {
        // Recupera os pontos do PHP como um array JSON
        var pontos = <?php echo $jsonPontosLixeira; ?>;

        var pontosOrdenados = [];

        // Calcular a distância para cada ponto e armazenar no array 'pontosOrdenados'
        pontos.forEach(function (ponto) {
            var distancia = calcularDistancia(minhaLatitude, minhaLongitude, parseFloat(ponto.latitude), parseFloat(ponto.longitude));
            console.log('Distância entre (' + minhaLatitude + ', ' + minhaLongitude + ') e (' + ponto.latitude + ', ' + ponto.longitude + '): ' + distancia + ' km');
            ponto.distancia = distancia; // Adiciona a distância ao objeto do ponto
            pontosOrdenados.push(ponto);
        });
    }

    function initMap() {
        map = new google.maps.Map(document.getElementById('mapa'), {
            center: { lat: -22.4363, lng: -46.8222 },
            zoom: 16
        });

        infoWindow = new google.maps.InfoWindow();
        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer({ map: map });

        var pontos = <?php echo $jsonPontosLixeira; ?>;


        pontos.forEach(function (ponto) {
            var corIcone = ponto.cor;
            var marker = new google.maps.Marker({
                position: { lat: parseFloat(ponto.latitude), lng: parseFloat(ponto.longitude) },
                map: map,
                title: 'Localização: ' + ponto.nome +
                    ' Capacidade: (Volume: ' + ponto.volume + ' - Peso: ' + ponto.peso + ')' +
                    ' Tipo: ' + ponto.tipo,
                icon: {
                    url: '../img/bin-' + corIcone + '.png', // Corrigido para usar a cor diretamente
                    scaledSize: new google.maps.Size(70, 70),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(20, 40)
                }
            });

            marker.addListener('click', function () {
                // Limpe a rota existente ao clicar em um marcador
                directionsRenderer.setDirections({ routes: [] });

                // Obtenha a localização atual
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var minhaLatitude = position.coords.latitude;
                        var minhaLongitude = position.coords.longitude;

                        // Calcula e exibe a rota até o ponto do marcador clicado
                        calcularRota(minhaLatitude, minhaLongitude, parseFloat(ponto.latitude), parseFloat(ponto.longitude));
                    });
                } else {
                    alert("Geolocalização não é suportada pelo seu navegador.");
                }
            });
        });
        // Chame a função para obter a localização atual
        obterLocalizacaoAtual();
    }
    function calcularRota(origemLat, origemLng, destinoLat, destinoLng) {
        var request = {
            origin: new google.maps.LatLng(origemLat, origemLng),
            destination: new google.maps.LatLng(destinoLat, destinoLng),
            travelMode: google.maps.TravelMode.DRIVING
        };

        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
            } else {
                alert('Não foi possível calcular a rota. Erro: ' + status);
            }
        });
        obterLocalizacaoAtual();
    }

    // Chame a função para obter a localização atual





</script>