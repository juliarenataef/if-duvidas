  <div class="ui menu" id="menu">
    <a href="../controlador/Usuarios.php" class="item">
      Página Inicial
    </a>

    <div id="teste" class="ui dropdown item">Geral
      <i class="dropdown icon"></i>
      <div class="menu ui hidden transition">
        <div class="item">
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Matemática</a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Português</a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Geografia</a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">História</a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Sociologia</a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Filosofia</a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Física</a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Espanhol</a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Inglês</a>
        </div>
      </div>
    </div>      
    <div class="ui dropdown item">Técnico
      <i class="dropdown icon"></i>
      <div class="menu ui hidden transition">
        <div class="item">
          <div class="item"><b>1º ano</b> </div>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Informática </a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Agropecuária </a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Química </a>
          <div class="item"><b>2º ano</b> </div>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Informática </a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Agropecuária </a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Química</a>
          <div class="item"><b>3º ano</b> </div>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Informática </a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Agropecuária </a>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Química</a>
          <div class="item"><b>4º ano</b> </div>
          <a href="../visualizacao/paginaDePerguntas.php" class="item">Química </a>
        </div>
      </div>
    </div>
    <div class="right menu">
      <div class="item">
        <div class="ui icon input">
          <input type="text" placeholder="Search...">
          <i class="search link icon"></i>
        </div>
      </div>

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
      <a class="item" href="../controlador/Usuarios.php?acao=paginaDoUsuario">
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
