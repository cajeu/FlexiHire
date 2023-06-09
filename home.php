<?php include "conn.php"; 
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:login.php');
    }
    $id=$_SESSION['login'];
    $nome=$conn->prepare('SELECT * FROM
    `funcionario` WHERE id_funcionario=:pid');
    $nome->bindValue(':pid',$id);
    $nome->execute();
    $rownome=$nome->fetch();

?>
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
            <div class="col-md-7 col-sm-12 my-sm-3 text-sm-start text-center ps-sm-5 ps-0">
                <h4>Flexihire</h4>
            </div>
            <div class="col-md-1 col-sm-12 my-sm-4 ps-0 mb-4 text-sm-start text-center">
                <a class="nav-link" href="./home.php">Home</a>
            </div>
            <div class="col-md-1 col-sm-12 my-sm-4 ps-0 mb-4 text-sm-start text-center">
                <a class="nav-link" href="./home.php">Vagas</a>
            </div>
            <div class="col-md-1 col-sm-12 my-sm-4 ps-0 mb-4 text-sm-start text-center">
                <a class="nav-link" href="./home.php">Perfil</a>
            </div>
            <div class="col-md-1 col-sm-12 my-3">
            </div>
        </div>
    </div>
    <div class="container-fluid degrade topo">
        <div class="row topo">
        <div class="col-md-1 col-sm-12 my-3">
        </div>
        <div class="col-md-10 col-sm-12 my-3 ps-sm-5 ps-0 titulo">
            <?php 
            echo "<h5> Bem vindo(a) ".$rownome['nm_funcionario']."</h5>"; ?>
            <?php 
            if(isset($_GET['aviso'])){
                echo "Deseja realmente sair?
                <a class='log-link' href='home.php?logout'>Sim <a class='log-link' href='home.php'> Não</a></a>";
            }
            if(isset($_GET['logout'])){
                session_destroy();
                header('location:index.php');
            }
            ?>
        </div>
        <div class="col-md-1 col-sm-12 my-3">
        </div>
        </div>
    </div>
    <footer class="container-fluid footer">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-1">
                <a class="nav-link" href='home.php?aviso'>Sair</a>
            </div>
            <div class="col-sm-9 text-sm-end text-center">
                <p>Fale conosco: contato@flexihire.com</p>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
        </div>  
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
<?php
