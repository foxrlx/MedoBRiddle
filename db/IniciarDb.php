<?php
function IniciarDB() {
	include 'nfdb.php';
	$db = new NFDB();
	
	$db->exec('CREATE TABLE Usuario (Id INTEGER PRIMARY KEY AUTOINCREMENT, Nome VARCHAR(200) NOT NULL, Senha VARCHAR(200) NOT NULL, Inicio DATETIME, Fim DATETIME)');
	$db->exec('CREATE TABLE Desafio (Id INTEGER PRIMARY KEY, Nome VARCHAR(200) NOT NULL, Url VARCHAR(200) NOT NULL)');
	$db->exec('CREATE TABLE UsuarioDesafio (Id INTEGER PRIMARY KEY AUTOINCREMENT, IdUsuario INTEGER, IdDesafio INTEGER, Inclusao DATETIME )');
	
	$db->exec('INSERT INTO Desafio(Id, Nome, Url) VALUES(1, "Inicio", "https://30nf.000webhostapp.com/entry/index.php")');
	$db->exec('INSERT INTO Desafio(Id, Nome, Url) VALUES(2, "Quem sou eu?", "https://30nf.000webhostapp.com/quemsoueu/nomeie.html")');
	$db->exec('INSERT INTO Desafio(Id, Nome, Url) VALUES(3, "Candle Lights", "https://30nf.000webhostapp.com/escuridao/nomeie.html")');
	$db->exec('INSERT INTO Desafio(Id, Nome, Url) VALUES(4, "Take my hand", "https://30nf.000webhostapp.com/void/takemyhand.html")');
	$db->exec('INSERT INTO Desafio(Id, Nome, Url) VALUES(5, "Pentagrama", "https://30nf.000webhostapp.com/google/it.html")');
	
	$db->exec('INSERT INTO Usuario(Nome, Senha) VALUES("fox", "foxrlx")');
	
		
	$db->close();
}
IniciarDB();
?>