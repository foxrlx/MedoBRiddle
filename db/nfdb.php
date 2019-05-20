<?php
class User {
	public $Id;
	public $Usuario;
}
class NFDB extends SQLite3 {
	function __construct() {
		$this->open('nfdb.db');
	}
	
	function GravarInicio($IdUsuario) {
		$sql = $this->prepare('UPDATE Usuario SET Inicio = DATETIME(\'NOW\') WHERE Id = :id');
		$sql->bindValue(':id', $IdUsuario, SQLITE3_INTEGER);
		$sql->execute();
	}
	function GravarFim($IdUsuario) {
		$sql = $this->prepare('UPDATE Usuario SET Fim = DATETIME(\'NOW\') WHERE Id = :id');
		$sql->bindValue(':id', $IdUsuario, SQLITE3_INTEGER);
		$sql->execute();
	}
	function GravarProgresso($IdUsuario, $IdDesafio) {
		$sql = $this->prepare('INSERT INTO UsuarioDesafio (IdUsuario, IdDesafio, Inclusao) VALUES(:idUsuario, :idDesafio, DATETIME(\'NOW\'))');
		$sql->bindValue(':idUsuario', $IdUsuario, SQLITE3_INTEGER);
		$sql->bindValue(':idDesafio', $IdDesafio, SQLITE3_INTEGER);
		$sql->execute();
	}
	
	function AutenticarUsuario($Usuario, $Senha) {
		$sql = $this->prepare('SELECT Id, Nome FROM Usuario WHERE Nome = :nome AND Senha = :senha');
		$sql->bindValue(':nome', $Usuario, SQLITE3_TEXT);
		$sql->bindValue(':senha', $Senha, SQLITE3_TEXT);
		$resultado = $sql->execute();
		
		if ($dados = $resultado->fetchArray(SQLITE3_ASSOC)) {
			$user = new User();
			foreach ($dados as $row) {
				$user->Id = $row['Id'];
				$user->Usuario = $row['Nome'];
			}
			
			return $user;
		}
		else 
			return null;
	}
	
}
?>