<!DOCTYPE html>
<html>
<head>


	
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href=../visualizacao/estilo.css>
<link rel="stylesheet" type="text/css" href=../visualizacao/semantic/semantic.css>
<script type="text/javascript" src=../visualizacao/jquery.js></script>
<script type="text/javascript" src=../visualizacao/semantic/semantic.js></script>
<script type="text/javascript" src=../visualizacao/semantic/components/dropdown.js></script>
<link rel="stylesheet" type="text/css" href=../visualizacao/semantic/components/dropdown.css>
<script type="text/javascript" src=../visualizacao/script.js></script>

</head>
<body>

<?php include'menu.php' ?>


					<div id="frente">
			<div>

				<img src='<?=$usuario['foto_perf']?>'>
			</div>
			<div class="four wide column" id="sobre_usuario" >
					<h2> <?=$usuario['Nome']?> </h2>

					<?php if ($cod_tip == '5'){ ?>
						<h3> <?=$usuario['turma']?> </h3>
						<h3>Perguntas feitas: <?=$numDePergutas['numeroDePerguntas']?></h3>
					<?php }; ?>

					<?php if ($cod_tip == '4'){ ?>
						<h3>Perguntas respondidas:FAZER</h3>
					<?php }; ?>

				</div>
			</div>


					<div  id="tras">		
			<img id="imagem_tras" src="http://www.technikart.com/wp-content/uploads/2017/05/twin-peaks.jpg">			
				</div>


		


   
   	<div class="ui grid" id="conteudo">
   			   	
	
        
       <?php if ($cod_tip == '5') { ?>

       	<div class="ui horizontal section divider">Perguntas feitas por <?=$usuario['Nome']?></div>
      <div class="ui vertically divided grid">

	<?php foreach ($perguntas as $pergunta) { ?>
		
	<div class="row">
          <div class="sixteen wide column">
          <a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$pergunta['id_pergunta']?>" style="color: inherit; ">
       		 <h4 class="ui header"><?=$pergunta['titulo']?></h4>
          	<?=$pergunta['descricao_pergunta']?>
          	</a>
          </div>
        </div>

	<?php }} ?>

	       <?php if ($cod_tip == '4') { ?>

       	<div class="ui horizontal section divider">Perguntas respondidas por <?=$usuario['Nome']?></div>
      <div class="ui vertically divided grid">

	<?php foreach ($respostas as $resposta) { ?>
		
	<div class="row">
          <div class="sixteen wide column">
          <a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$resposta['id_pergunta']?>" style="color: inherit; ">
       		 <h4 class="ui header"><?=$resposta['titulo']?></h4>
          	<?=$resposta['descricao_pergunta']?>
          	</a>
          </div>
        </div>

	<?php }} ?>
      </div>
   		
   	</div>

<?php include'footer_smallpage.php' ?>

   	</body>
   		

	



		




