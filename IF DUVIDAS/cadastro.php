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
    <form class="ui form aligned segment">
  <div class="field">
    <label>Login</label>
    <input type="text" name="first-name" placeholder="login">
  </div>
  <div class="field">
    <label>Senha</label>
    <input type="text" name="last-name" placeholder="senha">
  </div>
   <div class="field">
    <label>Email</label>
    <input type="text" name="first-name" placeholder="email">
  </div>
   <div class="field">
    <label>Matrícula</label>
    <input type="text" name="first-name" placeholder="matricula">
  </div>
  <div class="field">
  </div>
  <a class="ui button" href="usuario.php">Pronto!</a>
</form>
  </div>
  <div class="five wide column"></div>
  </div>

 
</body>
<footer>
    <?php include'footer_smallpage.php' ?>
</footer>







</html>
