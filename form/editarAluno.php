<!doctype html>

<html lang="pt_br">
  <head>
    <title>curso de PDO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
      <header class="mb-5">
        <nav class="navbar navbar-expand-md  navbar-light bg-info  fixed-top">
            <div class="container">
              <a href="home.php" class="navbar-brand">
                  <h5>CRUD PDO</h5>
              </a>
              
              <button class="navbar-toggler" data-toggle="collapse"
              data-target="#nav-principal">
              <i class="fas fa-bars fa-3x "></i>
              </button>

              <div class="collapse navbar-collapse " id="nav-principal">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link">Novos Alunos</a>
                    </li>
                </ul>
              </div>

            </div>
        </nav>
    </header>
  <body class="pt-5">
    <div class="container">
     <div class="container">  

      <div class="py-3 text-center">
        <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
        <h2>Editar Alunos</h2>     
</div>

  <div class="row">
    <div class="col-md-12">
  
  <div class="card-body font-weight-bold">
    <form action="../database/aluno/update.php" method="post">
       <div class="form-group">
        <label for="id"></label>
        <input name="id" type="hidden" id="id" value="<?php echo $value['id']; ?>"  class="form-control" placeholder="Digite aqui uma Modalidade" required>
      </div>
      <div class="form-group">
        <label for="nome">Nome</label>
        <input name="nome" type="text" id="modalidade" value="<?php echo $value['nome']; ?>" class="form-control"  placeholder="Digite aqui uma nome" required>
      </div>
      <div class="form-group">
        <label for="telefone">telefone</label>
        <input name="tel" type="text" id="telefone" value="<?php echo $value['tel']; ?>" class="form-control"  placeholder="Digite aqui uma telefone" required>
      </div>
       <div class="form-group">
        <label for="telefone">E-mail</label>
        <input name="email" type="text" id="email" value="<?php echo $value['email']; ?>" class="form-control"  placeholder="Digite aqui uma telefone" required>
      </div>
      <div class="form-group">
        <label for="modalidade">Modalidade</label>
        <input name="modalidade" type="text" id="modalidade" value="<?php echo $value['modalidade']; ?>" class="form-control"  placeholder="Digite aqui uma Modalidade" required>
      </div>

      <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
      <a class="btn btn-danger btn-lg" href="modalidade.php">Voltar</a>

    </form>
  </div>
</div>