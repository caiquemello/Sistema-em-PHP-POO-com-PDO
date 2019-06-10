<?php

	$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

	require_once '../../classes/autoload.php';

	$delete = new Modalidade();
	$delete->delete($id);
	                                   
?>