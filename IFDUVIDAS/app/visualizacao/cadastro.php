<!DOCTYPE html>
<html>
<head>
<?php include'head.php' ?>

</head>
<body>

<?php include'menu.php' ?>

<div class="ui grid" id="grid_cadastro">
  <div class="five wide column"></div>
  <div class="six wide column" >
    <form class="ui form aligned segment" method="post" action="../controlador/Usuarios.php?acao=cadastrar">
  
   <div class="field">
    <label>Nome</label>
    <input type="text" name="nome"  id="nome">
  </div>
  <div class="field">
    <label>Senha</label>
    <input type="password" name="senha"  id="senha">
  </div>
   <div class="field">
    <label>Email</label>
    <input type="email" name="email"  id="email">
  </div>
   <div class="field">
    <label>Matrícula</label>
    <input type="number" name="num_matricula"  id="num_matricula">
  </div>

   <div class="field">
    <label>Data de nascimento</label>
    <input type="date" name="data_nasc"  id="data_nasc">
  </div>  
   <div class="field">
    <label>Turma</label>
    <input type="text" name="turma"  id="turma">
  </div>
     <div class="field">
    <label>Registro Geral</label>
    <input type="number" name="RG"  id="RG">
  </div>
     <div class="field">
    <label>Foto</label>
    <input type="file" name="foto_perf"  id="num_matricula">
  </div>
  <div class="field">
  </div>
   <button class="ui button" type="submit" value="gravar" name="gravar" id="gravar">Cadastrar</button>
</form>

  </div>
  <div class="five wide column"></div>
  </div>

 
</body>








</html>
