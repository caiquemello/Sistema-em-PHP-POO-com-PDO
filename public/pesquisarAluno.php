<?php require_once '../confing/header.php' ?>
  <div class="row">
    <div class="col-md-12">
  <h3 class="col-md-12">Pesquisa dos Alunos</h3>
  <hr class="bg-info">
  <div class="card-body font-weight-bold">
    <form action="" method="post">
      <div class="form-group">
        <label for="search">Pesquisa:</label>
        <input name="search" type="text" class="form-control"  placeholder="Digite aqui sua pesquisa...">
      </div>


      <button type="submit" class="btn btn-primary btn-lg">Pesquisa</button>
      <button type="submit" class="btn btn-danger btn-lg">Voltar</button>
    </form>
  </div>
<h2 class="col-md-12">Alunos cadastrados</h2>
<br>
<table class="col-md-12">
	<thead>
		<tr><th>Id</th><th>Nome</th><th>Telefone</th><th>E-mail</th><th>Modalidade</th><th>Mensalidade</th><th>Acões</th></tr>
	</thead>
	<tbody>
		<?php 
		require_once '../database/aluno/read.php';
		 ?>
	</tbody>
</table>
</div>
<br><br>