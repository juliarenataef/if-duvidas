

  <div class="ui menu" id="menu">
    <a href="../controlador/Usuarios.php" class="item">
      Página Inicial
    </a>

    <div id="teste" class="ui dropdown item">Geral
      <i class="dropdown icon"></i>
      <div class="menu ui hidden transition">
        <div class="item">
          <a href="../controlador/Usuarios.php?acao=peguntasPorMateria&materia=matematica" class="item">Matemática</a>
          <a href="../controlador/Usuarios.php?acao=peguntasPorMateria&materia=portugues" class="item">Português</a>
          <a href="../controlador/Usuarios.php?acao=peguntasPorMateria&materia=geografia" class="item">Geografia</a>
          <a href="../controlador/Usuarios.php?acao=peguntasPorMateria&materia=historia" class="item">História</a>
          <a href="../controlador/Usuarios.php?acao=peguntasPorMateria&materia=sociologia" class="item">Sociologia</a>
          <a href="../visualizacao/../controlador/Usuarios.php?acao=peguntasPorMateria&materia=filosofia" class="item">Filosofia</a>
          <a href="../controlador/Usuarios.php?acao=peguntasPorMateria&materia=fisica" class="item">Física</a>
          <a href="../controlador/Usuarios.php?acao=peguntasPorMateria&materia=espanhol" class="item">Espanhol</a>
          <a href="../controlador/Usuarios.php?acao=peguntasPorMateria&materia=ingles" class="item">Inglês</a>
        </div>
      </div>
    </div>      
    <div class="ui dropdown item">Técnico
      <i class="dropdown icon"></i>
      <div class="menu ui hidden transition">
        <div class="item">
          <a href="../controlador/Usuarios.php?acao=peguntasPorCurso&curso=informatica" class="item">Informática </a>
          <a href="../controlador/Usuarios.php?acao=peguntasPorCurso&curso=agropecuaria" class="item">Agropecuária </a>
          <a href="../controlador/Usuarios.php?acao=peguntasPorCurso&curso=quimica" class="item">Química </a>
        </div>
      </div>
    </div>
    <div class="right menu">
    <form method="POST" action="../controlador/Usuarios.php?acao=busca">
<div class="ui input focus">
  <input type="text" name="pesquisa"  placeholder="buscar"/>
  <input type="submit" value="buscar"/>
</div>
</form>

      

      <?php 
      if (!isset($_SESSION['id_usuario'])) {
        ?>
        <a class="ui item" href="../controlador/Usuarios.php?acao=login">
        Login
      </a>
      <a class="ui item" href="../controlador/Usuarios.php?acao=cadastrar">
        Cadastrar
      </a>  
      <?php
    }      ?>

    <?php 
      if (isset($_SESSION['id_usuario'])) {
     ?>   
      <a class="item" href="../controlador/Usuarios.php?acao=paginaDoUsuario&id_usuario=<?=$_SESSION['id_usuario']?>">
          <i class="setting icon"></i>
          Perfil
       </a>
       <a class="item" href="../controlador/Usuarios.php?acao=logout">
          Logout
       </a>

    <?php
  }     ?>


 
    </div>
  </div>
