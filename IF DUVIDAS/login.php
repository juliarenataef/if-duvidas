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
    <form class="ui form aligned segment" id="form_cadastro">
        <div class="field">
          <label>Login</label>
          <input type="text" name="first-name" placeholder="exemplo@exemplo.com">
        </div>
        <div class="field">
          <label>Senha</label>
          <input type="text" name="last-name" placeholder="exemplo_password">
        </div>
        <a class="ui button" href="usuario.php">Log In</a>
      </form>

    </div>
    <div class="five wide column"></div>
  </div>


</body>
<footer>
    <?php include'footer_smallpage.php' ?>
</footer>






</html>
