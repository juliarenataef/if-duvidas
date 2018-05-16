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
    <form class="ui form aligned segment" method="post" action="../controlador/Usuarios.php?acao=inserir">
  
   <div class="field">
    <label>Nome</label>
    <input type="text" name="nome" placeholder="fulano" id="nome">
  </div>
  <div class="field">
    <label>Senha</label>
    <input type="text" name="senha" placeholder="senha" id="senha">
  </div>
   <div class="field">
    <label>Email</label>
    <input type="email" name="email" placeholder="email" id="email">
  </div>
   <div class="field">
    <label>Matrícula</label>
    <input type="number" name="num_matricula" placeholder="matricula" id="num_matricula">
  </div>

   <div class="field">
    <label>Data de nascimento</label>
    <input type="date" name="data_nasc" placeholder="dia/mes/ano" id="data_nasc">
  </div>  
   <div class="field">
    <label>Turma</label>
    <input type="text" name="turma" placeholder="3info2" id="turma">
  </div>
     <div class="field">
    <label>Registro Geral</label>
    <input type="number" name="RG" placeholder="RG" id="RG">
  </div>
     <div class="field">
    <label>Foto</label>
    <input type="file" name="foto_perf" placeholder="matricula" id="num_matricula">
  </div>
       <div class="field">
    <label>Login</label>
    <input type="text" name="login" placeholder="login" id="login">
  </div>
<div class="ui radio checkbox">
  <input type="radio" name="cod_tip" value="1">
  <label>Professor</label>
</div>
<div class="ui radio checkbox">
  <input type="radio" name="cod_tip" value="2">
  <label>Aluno</label>
</div>
  <div class="field">
  </div>
   <button class="ui button" type="submit" value="gravar" name="gravar" id="gravar">Submit</button>
</form>

  </div>
  <div class="five wide column"></div>
  </div>

 
</body>








</html>
