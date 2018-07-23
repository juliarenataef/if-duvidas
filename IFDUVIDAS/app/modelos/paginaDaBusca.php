<!DOCTYPE html>
<html>
<head>
	<?php include'head.php' ?>

</head>
<body>

	<?php include'menu.php' ?>

	<div class="ui sixteen column divided grid">
		<div class="four wide column">
			<div class="ui secondary vertical fluid pointing menu">
				<h3  align="center">Filtrar por</h3>
				<a class="active item">
					Mais curtidas 
				</a>
				<a class="item">
					Respondidas
				</a>
				<a class="item">
					Mais comentadas
				</a>
			</div>

			<h3>Não encontrou o que procurava?</h3>
			<a href="../controlador/Usuarios.php?acao=cadastrarPergunta"><h3>Crie uma pergunta!</h3></a>
			
		</div>




		<div class="eleven wide column">
			<h1 align="center" class="ui header">Quanto é 2 mais 2?</h1>

			<?php
			if ($busca != null) {
			$crud = new CrudPerguntas();
            $pesquisas = $crud->busca($busca); 

			//foreach ($pesquisass as $pesquisas):?>

			<div class="ui vertical segment">
			<?php if ($pesquisas['status'] == "1") { ?>
				<a class="ui green right ribbon label">Respondida</a>
			<?php } ?>
				<a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$pesquisas['id_pergunta']?>" style="color: inherit; "><h3><?=$pesquisas['titulo']?></h3></a>
				<p> <?=$pesquisas['descricao_pergunta']?> </p>
				</div>

			<?php } ?>

					<div class="one wide column"></div>


								</div>
							</div>





						</body>
						</html>



 