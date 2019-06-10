<?php
	
	require_once 'CrudModalidade.php';
	class Modalidade extends Conexao implements CrudModalidade {

		private $id,$modalidade,$mensalidade;

		protected function setId($id){
			$this->id = $id;
		}
		protected function setModalidade($modalidade){
			$this->modalidade = $modalidade;
		}
		protected function setMensaliade($mensalidade){
			$this->mensalidade = $mensalidade;
		}
			   		//get//
		protected function getId(){
			return $this->id;
		}
		protected function getModaidade(){
			return $this->modalidade;
		}
		protected function getMensalidade(){
			return $this->mensalidade;
		}
		public function dadosDaTabela($id){
			$conn = $this->conectar();
			$this->setId($id);
			$id = $this->getId();

			$sql = "SELECT * FROM modalidades WHERE id = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindparam('id',$id);
			$stmt->execute();
			$result = $stmt->fetchALL();

			foreach ($result as $value) {
				$this->setId($value['id']);
				$this->setModalidade($value['modalidade']);
				$this->setMensaliade($value['mensalidade']);

				$_id = $this->getId();
				$_modalidades = $this->getModaidade();
				$_mensalidade =$this->getMensalidade();

				require_once '../form/novoMod.php';
			}



		}
		public function dadoDoFomulario($modalidade,$mensalidade){
				$this->setModalidade($modalidade);
				$this->setMensaliade($mensalidade);
		}
			  //metodos da intaface//

		public function create(){
			$conn = $this->conectar();

			$mod = $this->getModaidade();
			$mens = $this->getMensalidade();

			$sql ="INSERT INTO modalidades VALUES(DEFAULT,:mod,:mens)";
			$stmt = $conn->prepare($sql);
			$stmt->bindparam(':mod',$mod);
			$stmt->bindparam(':mens',$mens);

			if($stmt->execute()){
				$_SESSION['sucesso'] = 'Cadastro feito com susseso';
				header('location:../../public/home.php');
			}else{
				$_SESSION['erro'] = 'Modalidade já cadastrada';
				header('location:../../public/home.php');
			}
	       

		}
		public function read(){
			$conn = $this->conectar();

			$sql = "SELECT * FROM modalidades";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchALL();

			foreach ($result as $value) {

				$this->setId($value['id']);
				$this->setMensaliade($value['mensalidade']);
				$this->setModalidade($value['modalidade']);

				$_id = $this->getId();
				$_mod = $this->getModaidade();
				$_mens = $this->getMensalidade();

				echo '<tr>';
				echo "<td>$_id</td>";
				echo "<td>$_mod</td>";
				echo "<td>$_mens</td>";
				echo "<td><a href='../public/EditarMod.php?id=$_id'><i class='far fa-edit'></i>Editar</a></button></td>";
				echo "<td><a href='../database/modalidade/delete.php?id=$_id'><i class='far fa-trash-alt'></i>Excluir</a></td>";
				echo "<td><a href='../public/novoAluno.php?id=$_id'><i class='fas fa-user-plus'></i>Novo Aluno</a></td>";
				echo '</tr>';

			}

		}
		public function update($id,$modalidade,$mensalidade){
				$conn = $this->conectar();
				$this->setId($id);
				$this->setModalidade($modalidade);
				$this->setMensaliade($mensalidade);

				$_id = $this->getId();
				$_mod = $this->getModaidade();
				$_mens = $this->getMensalidade();

				$sql = "UPDATE modalidades set modalidade = :mod,mensalidade = :mens WHERE :id = id";
				$stmt = $conn->prepare($sql);
				$stmt->bindparam(':id',$_id);
				$stmt->bindparam(':mod',$_mod);
				$stmt->bindparam(':mens',$_mens);	
				$stmt->execute();

				header('location:../../public/home.php');


		}
		public function delete($id){
			$conn = $this->conectar();
			$this->setId($id);
			$_id = $this->getId();

			$sql = 'DELETE FROM modalidades WHERE id = :id';
			$stmt = $conn->prepare($sql);
			$stmt->bindparam(':id',$_id);
			$stmt->execute();

			header('location:../../public/home.php');

		}


	}
?>