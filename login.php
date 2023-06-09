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
                <h4>FlexiHire - Login</h3>
            </div>
            <div class="col-md-3 col-sm-12 my-sm-4 ps-0 mb-4 text-sm-start text-center link">
                <a class="nav-link" href="./index.php">Home</a>
            </div>
        </div>
    </div>
    <form action="login.php" method="post">
    <div class="container-fluid login">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-sm-start px-5 py-3 degrade branco rounded-3">
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="InputSenha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="InputSenha" name="senha">
                    <a href="#" class="pedirsenha py-3"><small>Esqueceu sua senha? Clique aqui.</small></a>
                  </div>
                  <button type="submit" class="btn btn-primary border-0" name="logar">Entrar</button>
            </div>
        </div>
    </div>
    </form>
    <?php
        if(isset($_POST['logar'])){
            $user=$_POST['email'];
            $senha=$_POST['senha'];
            $login=$conn->prepare('SELECT * FROM 
            `funcionario` WHERE `nm_email`= :pemail
            AND `nr_senha`=:psenha;');
            $login->bindValue(':pemail',$user);
            $login->bindValue(':psenha',$senha);
            $login->execute();
            $funcionario = 1;
            if($login->rowCount()==0){
                ?> <h4 class="text-center"> Login ou senha invalida! </h4><?php
            }else{
                session_start();
                $row=$login->fetch();
                $_SESSION['login']=$row['id_funcionario'];
                header('location:home.php');             
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
        </div>  
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>