<?php
	session_start();
	  require_once 'crudAluno.php';

	class Aluno extends Conexao implements CrudAluno{


		private $id,$nome,$tel,$email,$modalidade ;

		protected function setId($id){
			$this->id = $id;
		}

		protected function setNome($nome){
			$this->nome = $nome;
		}
		protected function setTel($tel){
			$this->tel = $tel;
		}
		protected function setEmail($email){
			$this->email = $email;
		}
		protected function setModalidade($modalidade){
			$this->modalidade = $modalidade;
		}
			//metodo get

		protected function getId(){
			return $this->id;
		}

		protected function getNome(){
			return $this->nome;
		}
		protected function getTel(){
			return $this->tel;
		}
		protected function getEmail(){
			return $this->email;
		}
		protected function getModalidade(){
			return $this->modalidade;
		}
			//medoto especifico//
		public function dadosDaTabela($id){
			$conn = $this->conectar();

			$this->setId($id);
			$_id = $this->getId();

			$sql = "SELECT * FROM tb_alunos WHERE :id = id";
			$stmt = $conn->prepare($sql);
			$stmt->bindparam(':id',$_id);
			$stmt->execute();
			$result = $stmt->fetchALL();
			foreach ($result as $value) {
				
				require_once '../form/editarAluno.php';
			}
		}
		public function dadosDoFormulario($nome,$tel,$email,$modalidade){
			$this->setNome($nome);
			$this->setTel($tel);
			$this->setEmail($email);
			$this->setModalidade($modalidade);
		}

				//Metodos da Interface//
		public function create(){
			$conn = $this->conectar();

			$_nome = $this->getNome();
			$_tel = $this->getTel();
			$_email = $this->getEmail();
			$_modalidade = $this->getModalidade();

			$sql = "INSERT INTO tb_alunos values(default,:nome,:tel,:email,:modalidade)";

			$stmt =	$conn->prepare($sql);
			$stmt->bindparam(':nome',$_nome);
			$stmt->bindparam(':tel',$_tel);
			$stmt->bindparam(':email',$_email);
			$stmt->bindparam(':modalidade',$_modalidade);

			if($stmt->execute()){
				$_SESSION['sucesso'] = 'cadastrado com sucesso"!';
				header('location:../../public/pesquisarAluno.php');
			}else{
				$_SESSION['erro'] = 'erro aluno ja cadastrado"!';
				header('location:../../public/pesquisarAluno.php');
			}
		}
		public function read($search){
			$conn = $this->conectar();
			$search = $search .'%';

			$sql ="select tb_alunos.id, tb_alunos.nome,tb_alunos.tel,tb_alunos.email,tb_alunos.modalidade,modalidades.modalidade,modalidades.mensalidade from tb_alunos join modalidades
			on modalidades.id = tb_alunos.modalidade 
			where tb_alunos.nome like :search order by nome" ;

			$stmt = $conn->prepare($sql);
			$stmt->bindparam('search',$search);
			$stmt->execute();
			$resul = $stmt->fetchALL();

			foreach ($resul as $value) {
				$id = $value['id'];
				echo "<tr>";
				echo '<td>'.$value['id'].'</td>';
				echo '<td>'.$value['nome'].'</td>';
				echo '<td>'.$value['tel'].'</td>';
				echo '<td>'.$value['email'].'</td>';
				echo '<td>'.$value['modalidade'].'</td>';
				echo '<td>'.$value['mensalidade'].'</td>';
				echo "<td><a href='EditarAluno.php?id=$id'><i class='far fa-edit'></i>Editar</a></td>";
				echo "<td><a href='../database/aluno/delete.php?id=$id'><i class='far fa-trash-alt'></i>Excluir</a></td>";
				echo "</tr>";
			}

		}
		public function update($id,$nome,$tel,$email,$modalidade){
			$conn = $this->conectar();

			$this->setId($id);
			$this->setNome($nome);
			$this->setTel($tel);
			$this->setEmail($email);
			$this->setModalidade($modalidade);

			$_id = $this->getId();
			$_nome = $this->getNome();
			$_tel = $this->getTel();
			$_email =$this->getEmail();
			$_modalidade = $this->getModalidade();

		$sql= "UPDATE tb_alunos SET nome = :nome,tel = :tel,email = :email,modalidade = :modalidade WHERE :id = id";
			$stmt = $conn->prepare($sql);
			$stmt->bindparam(':id',$_id);
			$stmt->bindparam(':nome',$_nome);
			$stmt->bindparam(':tel',$_tel);
			$stmt->bindparam(':email',$_email);
			$stmt->bindparam(':modalidade',$_modalidade);
			$stmt->execute();

			header('location:../../public/pesquisarAluno.php');
		}
		public function delete($id){
			$conn = $this->conectar();

			$this->setId($id);
			$_id = $this->getId();

			$sql = "DELETE FROM tb_alunos WHERE id = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindparam(':id',$_id);
			$stmt->execute();

			header('location:../../public/pesquisarAluno.php');


		}

	}

?>