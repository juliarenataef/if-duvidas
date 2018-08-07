
<!DOCTYPE html>
<html>
<head>
<?php include'head.php' ?>

</head>
<body>

<?php include'menu.php' ?>

<div class="ui sixteen wide divided grid">
		<div class="one wide column"></div>
		<div class="three wide column" id="divImagem">

    <?php 
      echo '<img src="data:image/jpeg;base64,' . $usuario['foto_perf'] . '" />';
     ?>

    <h4><?=$usuario['Nome']?></h4>
	</div>
		<div class="eleven wide column" id="divPergunta">
			<h3> <?=$pergunta['titulo']?> </h3>
			<p> <?=$pergunta['descricao_pergunta']?> </p>
      <div class="ui labeled button" tabindex="0">
  <div class="ui button">
    <i class="heart icon"></i> Like
  </div>
  <a class="ui basic left pointing label">
    1,048
  </a>
</div>   
    </div>
		<div class="one wide column"></div>
	</div>


	<div class="ui sixteen wide divided grid">
	<div class="one wide column"></div>
		<div class="seven wide column">
			<div class="ui comments">
  <h3 class="ui dividing header">Comentarios</h3>
  <?php foreach ($comentarios as $comentario) { ?>
    <div class="comment">
    <a class="avatar">
    </a>
    <div class="content">
      <a class="author"><?=$comentario['Nome']?></a>
      <div class="metadata">
        <span class="date"><?=$comentario['data_comentario']?></span>
      </div>
      <div class="text">
        <?=$comentario['texto_comentario']?>
      </div>
    </div>
    </div>
    
  <?php } ?>
      <?php 
      if (isset($_SESSION['id_usuario']) and $_SESSION['cod_tip'] == 5) { ?>
        <form class="ui reply form" method="post" action="../controlador/Usuarios.php?acao=comentario&id_pergunta=<?=$pergunta['id_pergunta']?>">
      <input type="text" name="texto_comentario">
      <button class="ui button" type="submit" name="enviar" >Comentar!</button> 
  </form>
    </div>
      <?php 
      }; ?>

    </div>
   



		<div class="seven wide column">
			<div class="ui comments">
      <h3 class="ui dividing header">Respostas</h3>

      <?php foreach ($respostas as $resposta) { ?>
        
        <div class="comment">
    <a class="avatar">
      
    </a>
    <div class="content">
      <a class="author"><?=$resposta['Nome']?></a>
      <div class="metadata">
        <div class="date"><?=$resposta['data_resposta']?></div>
      </div>
      <div class="text">
        <p><?=$resposta['texto_resposta']?></p>
      </div>
    </div>
  </div>

      <?php } ?>




            <?php 
      if (isset($_SESSION['id_usuario']) and $_SESSION['cod_tip'] == 4) { ?>
  <form class="ui reply form" method="post" action="../controlador/Usuarios.php?acao=resposta&id_pergunta=<?=$pergunta['id_pergunta']?>">
      <input type="text" name="texto_resposta">
      <button class="ui button" type="submit" name="enviar" >Responder!</button> 
  </form>
      <?php 
      }; ?>
  

    </div>
    </div>
		<div class="one wide column"></div>
    </div>



	




</body>
</html>