<!DOCTYPE html>
<html>
<head>
<?php include'head.php' ?>

</head>
<body>

<?php include'menu.php' ?>

<div class="ui grid" >
  <div class="four wide column"></div>
  <div class="eight wide column">

    <form class="ui equal width aligned segment form" method="post" action="../controlador/Usuarios.php?acao=cadastrar" enctype='multipart/form-data'>
   <div class="field">
    <label>Nome</label>
    <input type="text" name="nome">
  </div>
  <div class="field">
    <label>Senha</label>
    <input type="password" name="senha">
  </div>
   <div class="field">
    <label>Email</label>
    <input type="email" name="email">
  </div>
   <div class="field">
    <label>Data de nascimento</label>
    <input type="date" name="data_nasc">
  </div>  
   <div class="field">
    <label>Turma</label>
    <select class="ui dropdown" name="turma">
      <option value="">Selecione sua turma</option>
      <option value="1INFO1">1INFO1</option>
      <option value="1INFO2">1INFO2</option>
      <option value="1INFO3">1INFO3</option>
      <option value="1AGRO2">1AGRO2</option>
      <option value="1AGRO3">1AGRO3</option>
      <option value="1QUIMI">1QUIMI</option>
      <option value="2QUIMI">2QUIMI</option>
      <option value="3QUIMI">3QUIMI</option>
      <option value="4QUIMI">4QUIMI</option>
      </select>
  </div>
  <div class="field">
    <label>Você é...</label>
    <select class="ui dropdown" name="cod_tip">
      <option value="">Aluno ou professor?</option>
      <option value="4">Professor</option>
      <option value="5">Aluno</option>
      </select>
  </div>
     <div class="field">
    <label>Foto</label>
    <input type="file" name="foto_perf">
  </div>
  <div class="field">
  </div>
   <button class="ui button" type="submit" value="gravar" name="gravar" id="gravar">Cadastrar</button>
</form>

  </div>
  <div class="four wide column"></div>
  </div>
</body>








</html>