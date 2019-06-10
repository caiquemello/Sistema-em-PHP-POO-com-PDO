<?php
	
	interface CrudModalidade{

		public function create();
		public function read();
		public function update($id,$modalidade,$mensalidade);
		public function delete($id);
	}

?>