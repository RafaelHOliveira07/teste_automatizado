<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->



    <link rel="shortcut icon" href="../img/bin-verde.png" type="image/x-icon">

    <link rel="stylesheet" href="../style/style-cadas.css" !important>
    <title>Cadastro-Empresas</title>
</head>

<body>

   
    <main class=" ">
        <h1>Cadastro de Empresas/Parceiros</h1>
        <p>Preencha o formulario abaixo corretamente e nos envie, breve entramos em contato.</p>
        <form action="gravar-empresa.php" method="POST">

            <div class="form-row panel">
                <div class="form-group col-md-6">
                    <label for="nome">Nome da Empresa
                        <input type="text" class="form-control" name="nome"
                            placeholder="Nome da empresa/instituição/coletivo" required></label>
                </div>
            </div>
            <div class="form-row panel">
                <div class="form-group col-md-6">
                    <label for="email">Email
                        <input type="text" class="form-control" name="email" placeholder="Email " required></label>
                </div>
                <div class="form-group col-md-4">
                    <label for="senha">Senha
                        <input type="password" class="form-control" name="senha" placeholder="Senha" required></label>
                </div>
            </div>
            <div class="form-row panel">
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade
                        <input type="text" class="form-control" name="cidade" placeholder="Cidade" required></label>
                </div>
                <div class="form-group col-md-4">
                    <label for="estado">Estado
                        <select name="estado" class="form-control" required>
                            <option selected>Escolher...</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select></label>
                </div>
            </div>
            <div class="form-row panel">
                <div class="form-group col-md-6">
                    <label for="endereco">Endereço
                        <input type="text" class="form-control" name="endereco" placeholder="Rua/Avenida"
                            required></label>
                </div>
                <div class="form-group col-md-4">
                    <label for="numero">Número
                        <input type="number" class="form-control" name="numero" placeholder="Número" required></label>
                </div>
            </div>
            <div class="form-row panel">
                <div class="form-group col-md-6">
                    <label for="tel">Telefone:
                        <input type="tel" class="form-control" name="tel" placeholder="Telefone/Celular" required
                            onkeyup="handlePhone(event)"></label>
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP:
                        <input type="text" class="form-control" name="cep" placeholder="CEP" maxlength="9" required
                            onkeyup="handleZipCode(event)"></label>
                </div>
            </div>
            <div class="button">
                <button type="submit" class="">Enviar</button>
            </div>

        </form>

        <span>voltar para o <a href="index.php">inicio</a></span>

    </main>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script>
        const handlePhone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        }
        document.getElementById('cnpj').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
            e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
        });
        const handleZipCode = (event) => {
            let input = event.target
            input.value = zipCodeMask(input.value)
        }

        const zipCodeMask = (value) => {
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{5})(\d)/, '$1-$2')
            return value
        }
    </script>

</body>

</html>