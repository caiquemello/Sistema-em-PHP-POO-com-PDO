<h3>Editar Modalidade</h3>
<hr>
<form action="../database/modalidade/update.php" method="post">
	<label>| Id</label>
	<input type="number" name="id" value="<?php echo $value['id'] ;?>">
	<br>
	<label>| Modaliade</label>
	<input type="text" name="modalidade" value="<?php echo $value['modalidade'];?>">
	<br>
	<label>| Mensaliade</label>
	<input type="number" name="mensalidade" value="<?php echo $value['mensalidade'];?>">
	<br>
	<button type="submit"> Cadastrar</button>
</form>