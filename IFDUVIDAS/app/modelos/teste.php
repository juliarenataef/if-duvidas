<?php 
	include "CrudUsuarios.php";
	include "CrudPerguntas.php";

	 $hora = "22";
	 $data = "555";
	 $descricao_pergunta = 'pergunta tooooop';
	 $titulo = 'ta fo';
	 $disciplina = 'informatica';
	 $id_pergunta = null;
	 $id_usuario = null;


	

	

	//$Nome = 'JOÃO DO oi';
	//$senha = 'teste';
	//$email = 'teste@gmail.com';
	//$num_matricula = "123456789";
	//$data_nasc = "16111998";
	//$turma = '3INFO2';
	//$RG = '89227400';
	//$foto_perf = null;
	//$login = 'teste';
	//$id_usuario = null;
	//$valido = "1";

	
	//$teste = new Usuario($Nome, $senha, $email, $num_matricula, $data_nasc, $turma, $RG, $foto_perf, $login, $valido);
	$teste2 = new Pergunta($hora, $data, $descricao_pergunta, $titulo, $disciplina);


	$crud = new CrudPerguntas();
	$crud -> getPerguntas($teste2);





	//$crud = new CrudUsuarios();

	//$crud->insertUsuario($teste);

	//echo "MEU";




 ?>

 