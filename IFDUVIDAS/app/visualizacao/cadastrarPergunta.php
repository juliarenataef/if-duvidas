

<!DOCTYPE html>
<html>
<head>
	<?php include'head.php' ?>
</head>
<body>
	<?php include'menu.php' ?>



<div class="ui grid">
  <div class="four wide column"></div>
  <div class="eight wide column">

<form class="ui form" method="post" action="../controlador/Usuarios.php?acao=cadastrarPergunta">
   <div class="field">
    <label>Titulo da Pergunta</label>
    <input type="text" name="titulo">
  </div>
    <div class="field">
    <label>Descrição da pergunta</label>
    <textarea name="descricao_pergunta"></textarea>
   </div>
    <div class="field">
    <label>A pergunta se refere a qual matéria?</label>
      <select class="ui dropdown" name="materia">
      <option value="">Selecione a matéria</option>
      <option value="matematica">Matematica</option>
      <option value="portugues">Português</option>
      <option value="geografia">Geografia</option>
      <option value="historia">História</option>
      <option value="sociologia">Sociologia</option>
      <option value="filosofia">Filosofia</option>
      <option value="fisica">Física</option>
      <option value="espanhol">Espanhol</option>
      <option value="ingles">Inglês</option>
      </select>
   </div>
     <div class="field">
    <label>A pergunta se refere a qual curso?</label>
    <select class="ui dropdown" name="curso">
      <option value="">Selecione o curso</option>
      <option value="informatica">Informatica</option>
      <option value="quimica">Química</option>
      <option value="agropecuaria">Agropecuaria</option>
      </select>
   </div>
   <button class="ui button" type="submit" value="gravar" name="gravar">Cadastrar Pergunta</button>
</div>

  </div>
  <div class="four wide column"></div>
</div>
</form>









  

</body>
</html>