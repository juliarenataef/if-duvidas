<?php 
	include "CrudUsuarios.php";


	

	

	$Nome = 'JOÃO DO TESTE';
	$senha = 'teste';
	$email = 'teste@gmail.com';
	$num_matricula = "123456789";
	$data_nasc = "16111998";
	$turma = '3INFO2';
	$RG = '89227400';
	$foto_perf = null;
	$login = 'teste';
	$id_usuario = null;
	$valido = "1";

	
	$teste = new Usuario($Nome, $senha, $email, $num_matricula, $data_nasc, $turma, $RG, $foto_perf, $login, $valido);




	$crud = new CrudUsuarios();

	$crud->insertUsuario($teste);

	echo "MEU";




 ?>

 