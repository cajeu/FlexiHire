<?php include "conn.php"; ?>
<html lang="pt">
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
                <h4>FlexiHire - Cadastro de Estabelecimento</h4>
            </div>
            <div class="col-md-3 col-sm-12 my-sm-4 ps-0 mb-4 text-sm-start text-center link">
                <a class="nav-link" href="./index.php">Home</a>
            </div>
        </div>
    </div>
    <form action="cadastroEstab.php" method="post">
      <div class="container-fluid ">
          <div class="row py-4">
              <div class="col-md-2">
              </div>
              <div class="col-md-8 col-sm-12 text-sm-start px-4 py-3 degrade branco rounded-3">
                <div class="mb-3">
                  <label for="InputNome" class="form-label">Nome:</label>
                  <input type="text" class="form-control" id="InputNome" name="nome">
                </div>
                <div class="mb-3">
                  <label for="InputCNPJ" class="form-label">CNPJ:</label>
                  <input type="text" class="form-control" id="InputCNPJ" name="cnpj">
                </div>
                <div class="mb-3">
                  <label for="InputRamo" class="form-label">Ramo:</label>
                  <input type="text" class="form-control" id="InputRamo" name="ramo">
                </div>
                <div class="mb-3">
                  <label for="InputResp" class="form-label">Nome do Responsável:</label>
                  <input type="text" class="form-control" id="InputResp" name="resp">
                </div>
                <div class="mb-3">
                  <label for="InputCPF" class="form-label">CPF do Responsável:</label>
                  <input type="text" class="form-control" id="InputCPF" name="cpf"> 
                </div>
                <div class="mb-3">
                  <label for="InputEmail" class="form-label">Email:</label>
                  <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                  <label for="InputSenha" class="form-label">Senha:</label>
                  <input type="password" class="form-control" id="InputSenha" name="senha">
                  <p class="pedirsenha py-3"><small>Já tem cadastro? faça seu <a href="login.php" class="pedirsenha">login</small></a></p>
                </div>
                <input type="submit" class="btn btn-light border-0" value="Cadastrar" name="cadastrarE" />
              </div>
              <div class="col-md-2">
              </div>
          </div>
      </div>
  </form>
  <?php
        if(isset($_POST['cadastrarE'])){
            $nome=$_POST['nome'];
            $cnpj=$_POST['cnpj'];
            $ramo=$_POST['ramo'];
            $resp=$_POST['resp'];
            $cpf=$_POST['cpf'];
            $user=$_POST['email'];
            $senha=$_POST['senha'];
            $validarE=$conn->prepare('SELECT * FROM `estabelecimento` WHERE `nm_email` LIKE :pemail');
            $validarE->bindValue(':pemail', $user);
            $validarE->execute();
            $validarC=$conn->prepare('SELECT * FROM `estabelecimento` WHERE `nr_cnpj` LIKE :pcnpj');
            $validarC->bindValue(':pcnpj', $cnpj);
            $validarC->execute();
            if($validarE->rowCount()==0){
                if($validarC->rowCount()==0){
                    $cadastro=$conn->prepare('INSERT INTO `estabelecimento` (`id_estabelecimento`, `nm_estabelecimento`,`tipo_estabelecimento`, `nr_cnpj`, `nm_responsavel`, `nr_cpf`, `nm_email`, `nr_senha`, `eh_funcionario`)
                    VALUES (NULL, :pnome, :pramo, :pcnpj, :presp, :pcpf, :pemail, :psenha, 0);');
                    $cadastro->bindValue(':pnome', $nome);
                    $cadastro->bindValue(':pramo', $ramo);
                    $cadastro->bindValue(':pcnpj', $cnpj);
                    $cadastro->bindValue(':presp', $resp);
                    $cadastro->bindValue(':pcpf', $cpf);
                    $cadastro->bindValue(':pemail', $user);
                    $cadastro->bindValue(':psenha', $senha);            
                    $cadastro->execute();
                    ?><h4 class="text-center"> Usuário Cadastrado </h4>
                    <br><?php
                } else {
                    ?><h4 class="text-center"> Esse CNPJ já está sendo usado. </h4>
                    <br><?php
                } 
                } else {
                    ?><h4 class="text-center"> Esse Email já está sendo usado. </h4>
                    <br><?php
                }
        }
        ?>
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