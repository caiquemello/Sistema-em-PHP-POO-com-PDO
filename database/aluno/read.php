<?php 
	require_once '../classes/autoload.php';

	$search = filter_input(INPUT_POST,'search', FILTER_SANITIZE_SPECIAL_CHARS);

	$readAluno = new Aluno();
	$readAluno->read($search);
 ?>