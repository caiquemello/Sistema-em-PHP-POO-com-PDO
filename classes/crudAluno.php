<?php

	interface CrudAluno{

		public function create();
		public function read($search);
		public function update($id,$nome,$tel,$email,$modalidade);
		public function delete($id);
	}
?>