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
    <form class="ui form aligned segment" id="form_cadastro" method="post" action="../controlador/Usuarios.php?acao=login">
        <div class="field">
          <label>Email</label>
          <input type="email" name="email" placeholder="exemplo@exemplo.com" id="email">
        </div>
        <div class="field">
          <label>Senha</label>
          <input type="text" name="senha" placeholder="senha" id="senha">
        </div>
   <button class="ui button" type="submit" value="entrar" name="entrar" id="entrar">Entrar</button>
      </form>

    </div>
    <div class="five wide column"></div>
  </div>


</body>
<footer>
    <?php include'footer_smallpage.php' ?>
</footer>






</html>
