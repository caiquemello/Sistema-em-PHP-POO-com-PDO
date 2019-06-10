<?php require_once '../confing/header.php';
session_start();
?>

<h2> Nova Modalidade</h2>
    <div class="container">
     <div class="container">  

      <div class="py-3 text-center">
        <hr class="bg-info">
      </div>

          <div class="row">
            <div class="col-md-12">
          
          <div class="card-body font-weight-bold">
            <form action="../database/modalidade/create.php" method="post">
              <div class="form-group">
                <label for="mensalidade">Modalidade</label>
                <input name="modalidade" type="text" class="form-control"  placeholder="Digite aqui uma Modalidade" required>
              </div>

              <div class="form-group">
                <label for="mensalidade">Mensalidade</label>
                <input name="mensalidade" type="number" class="form-control" placeholder="Mensalidade" required>
              </div>

              <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
              <button type="submit" class="btn btn-danger btn-lg">Limpar</button>
            </form>
          </div>
        </div>
<hr>	
	 <?php
	 
            if(isset($_SESSION['sucesso'])){
              echo "<p class = 'text-white row bg-success padding:10px text-center'>";
              echo $_SESSION['sucesso'];
              unset($_SESSION['sucesso']);
              echo "</p>";

            }elseif (isset($_SESSION['erro'])) {
              echo "<p class = 'text-white row bg-danger padding:10px text-center'>";
              echo $_SESSION['erro'];
              unset($_SESSION['erro']);
              echo "</p>";
            }
        ?>

<hr>
     <div class="col-12 text-center">
        
        <h2>Modalidade cadastradas</h2>
        <hr class="bg-info">
        <table class="col-md-12">
          <thead>
            <th>Id</th><th>Modalidade</th><th>Mensalidade</th><th>Editar</th><th>Excluir</th><th>Novo Aluno</th>
          </thead>
          <tbody>
          <?php
                require_once '../database/modalidade/read.php';
          ?>
          </tbody>
        </table> 
        <br>
    </div>
    <div>
    <br>
    <br>