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
				<img id="imagem_usuario" src="http://www.zastavki.com/pictures/640x480/2015/Girls_Smiling_beautiful_girl__photo_George_Chernyad_ev_111193_29.jpg">
			</div>
			<div class="four wide column" id="sobre_usuario" >
					<h2> <?=$usuario['Nome']?> </h2>
					<h3> <?=$usuario['turma']?> </h3>
					<h3>Perguntas respondidas: <?=$numDePergutas['numeroDePerguntas']?></h3>
				</div>
			</div>


					<div  id="tras">		
			<img id="imagem_tras" src="http://www.technikart.com/wp-content/uploads/2017/05/twin-peaks.jpg">			
				</div>


		
   	<div class="ui grid" id="conteudo">
   			   	
	<div class="ui horizontal section divider">Ultimas Perguntas</div>
      <div class="ui vertically divided grid">

<?php 
	foreach ($perguntas as $pergunta) { ?>
		
	<div class="row">
          <div class="sixteen wide column">
          <a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$pergunta['id_pergunta']?>" style="color: inherit; ">
       		 <h4 class="ui header"><?=$pergunta['titulo']?></h4>
          	<?=$pergunta['descricao_pergunta']?>
          	</a>
          </div>
        </div>

	<?php } ?>


      </div>
   	</div>   

        


<?php include'footer_smallpage.php' ?>

   	</body>