<?php 
	include "CrudUsuarios.php";
	include "CrudPerguntas.php";
	include "CrudRespostas.php";
	include "CrudComentarios.php";



	 $hora = "1";
	 $data = "10";
	 $descricao_pergunta = 'ble';
	 $titulo = 'teste';
	 $curso = 'informatica';
	 $materia = 'matematica';
	 $id_pergunta = "4";
	 $id_usuario = null;

	 $data_resposta= "12";
	 $texto_resposta = "ola";
	 $id_resposta = null;

	 $data_comentario= "1990-12-12";
	 $texto_comentario = "ola";
	 $id_comentario = null;



	
	$teste2 = new Pergunta($hora, $data, $descricao_pergunta, $titulo, $materia, $curso, $id_pergunta);
	$teste3 = new Resposta($data_resposta, $texto_resposta, $id_resposta);
	$teste4 = new Comentario($data_comentario, $texto_comentario, $id_comentario);




	//$crud = new CrudUsuarios();
	//$crud -> getFotoUsuario('3');

	$crud = new CrudPerguntas();
	$crud -> insertPergunta($teste2);

	//$crud = new CrudRespostas();
	//$crud -> insertResposta($teste3);

	//$crud = new CrudComentarios();
	//$crud -> insertComentario($teste4);

	echo "MEU";
 ?>

 