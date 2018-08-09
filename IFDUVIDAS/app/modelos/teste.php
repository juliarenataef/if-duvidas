<?php 
	include "CrudUsuarios.php";
	include "CrudPerguntas.php";
	include "crudRespostas.php";
	include "CrudComentarios.php";
	//include "curtida.php";

	//getCurtida('47');

	 $hora = "1";
	 $data = "10";
	 $descricao_pergunta = 'ble';
	 $titulo = 'teste';
	 $curso = 'informatica';
	 $materia = 'matematica';
	 $id_pergunta = "4";
	 $id_usuario = "47";

	 $data_resposta= "12";
	 $texto_resposta = "ola";
	 $id_resposta = null;

	 $data_comentario= "1990-12-12";
	 $texto_comentario = "ola";
	 $id_comentario = null;

	 $Nome = "teste3";
	 $senha = "123";
	 $email = "teste@gmail.com";
	 $num_matricula = "11111";
	 $data_nasc = null;
	 $turma = "3info2";
	 $foto_perf = null;
	 $cod_tip = "4";


	//$novoUsuario = new Usuario($Nome, $senha, $email, $num_matricula, $data_nasc, $turma, $foto_perf, $cod_tip);
	//$teste2 = new Pergunta($hora, $data, $descricao_pergunta, $titulo, $materia, $curso, $id_pergunta);
	$teste3 = new Resposta($data_resposta, $texto_resposta, $id_resposta);
	//$teste4 = new Comentario($data_comentario, $texto_comentario, $id_comentario);




	//$crud = new CrudUsuarios();
	//$crud -> insertUsuario($novoUsuario);

	//$crud = new CrudPerguntas();
	//$crud -> getCurtidas('47');

	$crud = new CrudRespostas();
	$crud -> getRespostas('47');

	//$crud = new CrudComentarios();
	//$crud -> insertComentario($teste4);

	//echo "MEU";
 ?>

 