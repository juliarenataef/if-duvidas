<?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

  <div class="ui menu" id="menu">
    <a href="index.php" class="item">
      Página Inicial
    </a>
    <div class="ui dropdown item">Geral
      <i class="dropdown icon"></i>
      <div class="menu ui hidden transition">
        <div class="item">
          <a href="paginaDePerguntas.php" class="item">Matemática</a>
          <a href="paginaDePerguntas.php" class="item">Português</a>
          <a href="paginaDePerguntas.php" class="item">Geografia</a>
          <a href="paginaDePerguntas.php" class="item">História</a>
          <a href="paginaDePerguntas.php" class="item">Sociologia</a>
          <a href="paginaDePerguntas.php" class="item">Filosofia</a>
          <a href="paginaDePerguntas.php" class="item">Física</a>
          <a href="paginaDePerguntas.php" class="item">Espanhol</a>
          <a href="paginaDePerguntas.php" class="item">Inglês</a>
        </div>
      </div>
    </div>      

    <div class="ui dropdown item">Técnico
      <i class="dropdown icon"></i>
      <div class="menu ui hidden transition">
        <div class="item">
          <div class="item"><b>1º ano</b> </div>
          <a href="paginaDePerguntas.php" class="item">Informática </a>
          <a href="paginaDePerguntas.php" class="item">Agropecuária </a>
          <a href="paginaDePerguntas.php" class="item">Química </a>
          <div class="item"><b>2º ano</b> </div>
          <a href="paginaDePerguntas.php" class="item">Informática </a>
          <a href="paginaDePerguntas.php" class="item">Agropecuária </a>
          <a href="paginaDePerguntas.php" class="item">Química</a>
          <div class="item"><b>3º ano</b> </div>
          <a href="paginaDePerguntas.php" class="item">Informática </a>
          <a href="paginaDePerguntas.php" class="item">Agropecuária </a>
          <a href="paginaDePerguntas.php" class="item">Química</a>
          <div class="item"><b>4º ano</b> </div>
          <a href="paginaDePerguntas.php" class="item">Química </a>
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
  if(!isset($_SESSION['id_usuario'])) 
    { 
         
    echo "foi 1 ";
  
  
  if ($_SESSION['id_usuario'] == ''){
      
    ?>
    <a class="ui item" href="../visualizacao/login.php">
        Login
      </a>
      <?php
    }
    ?>
     <?php
    if ($_SESSION['id_usuario'] == ''){
      ?>
    <a class="ui item" href="../visualizacao/cadastro.php">
        Cadastrar
      </a>  
      <?php
    }
  }else{ 
    echo "foi 2";
    ?>

    <a class="ui item" href="../visualizacao/login.php">
        Login
      </a>
   
 
    
    <a class="ui item" href="../visualizacao/cadastro.php">
        Cadastrar
      </a>  
      <a class="item" href="../visualizacao/usuario.php">
          <i class="setting icon"></i>
          Perfil
       </a>
<?php
  }
?>
   <?php 
    if(!isset($_SESSION)) {
   
  if ($_SESSION['id_usuario'] != ''){
     
  ?>
   <a class="ui butoon" href="../controlador/logout.php">
          logout
       </a>
<?php
  }
}
?>

 

    </div>

  </div>