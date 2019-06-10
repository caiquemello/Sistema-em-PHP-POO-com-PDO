<?php require_once '../confing/header.php' ?>
   <div class="container">
     <div class="container">  

      <div class="py-3 text-center">
      	<h2>Cadastrar Aluno</h2>
	        <hr class="bg-info">
      </div>

          <div class="row">
            <div class="col-md-12">
          
          <div class="card-body font-weight-bold">
            <form action="../database/aluno/create.php" method="post">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="text" class="form-control"  placeholder="Digite aqui uma nome" required>
              </div>

              <div class="form-group">
                <label for="tel">telefone</label>
                <input name="tel" type="tel" class="form-control" placeholder="Telefone" required>
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input name="email" type="email" class="form-control"  placeholder="Digite aqui o e-mail" required>
              </div>
              <?php 
                     $modalidade = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_SPECIAL_CHARS); 

              ?>
              <div class="form-group">
                <input name="modalidade" type="text" class="form-control" value="<?php echo $modalidade ?>"  placeholder="Digite aqui uma Modalidade" required>
              </div>

              <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
              <button type="submit" class="btn btn-danger btn-lg">Limpar</button>
            </form>
          </div>
