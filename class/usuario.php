<?php
	
	

	class Usuario {

		private $idusuario;
		private $nome;
		private $senha;


		public function getIdusuario(){

			return $this->idusuario;

		}

		public function setIdusuario($value){

			$this->idusuario = $value;


		}

			public function getNome(){

			return $this->nome;

		}

		public function setNome($value){

			$this->nome = $value;


		}
			public function getSenha(){

			return $this->senha;

		}

		public function setSenha($value){

			$this->senha = $value;


		}

		//fim 

		public function loadById($id){

			$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(

				":ID"=>$id
			));
			if(count($results)>0){


				$row = $results[0];

				$this->setIdusuario($row['idusuario']);
				$this->setNome($row['nome']);
				$this->setSenha($row['senha']);

			}

		}

		public static function getList(){


				$sql = new Sql();

				return $sql->select("SELECT * FROM tb_usuarios ORDER BY idusuario;");

		}

		public static function search($login){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios WHERE nome LIKE :SEARCH ORDER BY idusuario", array(

					':SEARCH'=>"%".$login."%"


			));


		}

		public function __toString(){

			return json_encode(array(

				"idusuario"=>$this->getIdusuario(),
				"nome"=>$this->getNome(),
				"senha"=>$this->getSenha(),

			));

		}

		public function login($nome, $password){

					$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_usuarios WHERE nome = :NOME AND senha = :PASSWORD", array(

				":NOME"=>$nome,
				":PASSWORD"=>$password
			));
			if(count($results)>0){


				$row = $results[0];

				$this->setIdusuario($row['idusuario']);
				$this->setNome($row['nome']);
				$this->setSenha($row['senha']);

			} else{

					throw new Exception("Login ou senha inválidos");
					

			}

		}


		}





?>