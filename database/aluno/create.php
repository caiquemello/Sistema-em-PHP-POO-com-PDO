<?php


	require_once '../../classes/autoload.php';
	
	$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
	$tel = filter_input(INPUT_POST,'tel',FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
	$modalidade = filter_input(INPUT_POST,'modalidade',FILTER_SANITIZE_SPECIAL_CHARS);


	$novoAluno = new aluno();
	$novoAluno->dadosDoFormulario($nome,$tel,$email,$modalidade);
	$novoAluno->create();
?>