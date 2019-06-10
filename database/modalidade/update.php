<?php
	
	$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
	$modalidade = filter_input(INPUT_POST,'modalidade',FILTER_SANITIZE_SPECIAL_CHARS);
	$mensalidade = filter_input(INPUT_POST,'mensalidade',FILTER_SANITIZE_SPECIAL_CHARS);

	require '../../classes/autoload.php';

	$update = new Modalidade();
	$update->update($id,$modalidade,$mensalidade);


?>