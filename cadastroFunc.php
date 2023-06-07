<?php include "conn.php"; ?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>FlexiHire</title>
</head>
<body class="Forms">
    <div class="container-fluid header">
        <div class="row">
            <div class="col-md-1 col-sm-12 my-3">
            </div>
            <div class="col-md-8 col-sm-12 my-sm-3 text-sm-start text-center ps-sm-5 ps-0 titulo">
                <h4>FlexiHire - Cadastro de Funcionario</h4>
            </div>
            <div class="col-md-3 col-sm-12 my-sm-4 ps-0 mb-4 text-sm-start text-center link">
                <a class="nav-link" href="./index.php">Home</a>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row py-4">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 col-sm-12 text-sm-start px-4 py-3 degrade branco rounded-3">
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control widtt:100px" id="InputEmail" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="InputNome" class="form-label">Nome:</label>
                    <input type="Nome" class="form-control" id="InputNome">
                  </div>
                  <div class="mb-3">
                    <label for="InputCPF" class="form-label">CPF:</label>
                    <input type="text" class="form-control" id="InputCPF" \ pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \>
                  </div>
                  <div class="mb-3">
                    <label for="InputExperiencia" class="form-label">Experiencia:</label>
                    <input type="text" class="form-control" id="InputExperiencia">
                  </div>
                  <div class="mb-3">
                    <label for="InputNascimento" class="form-label">Data de nascimento:</label>
                    <input type="date" class="form-control" id="InputNascimento">
                  </div>
                  <div class="mb-3">
                    <label for="InputSenha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="InputSenha">
                    <a href="http://localhost/trabalho%20facul/php/login.php?" class="pedirsenha py-3"><small>Já tem cadastro? faça seu login</small></a>
                  </div>
                  <button type="submit" class="btn btn-light border-0">Cadastrar</button>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <footer class="container-fluid footer">
        <div class="row">
            <div class="col-sm-11 text-sm-end text-center">
                <p>Fale conosco: contato@flexihire.com</p>
            </div>
            <div class="col-sm-1">
            </div>
        </div>  
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>