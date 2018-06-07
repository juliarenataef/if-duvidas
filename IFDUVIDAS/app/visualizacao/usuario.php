<?php 
session_start();
 ?>


<!DOCTYPE html>
<html>
<head>
<?php include'head.php' ?>

</head>
<body>

<?php include'menu.php' ?>

   <div class="ui grid" id="secao1">
    <div class="two wide colum" id="config">
      
    </div>
    <div class="four wide colum" id="gridFoto">
      <img class="ui medium circular image" src="media/aluno.jpg" id="foto">
    </div>
    <div class="ten wide column" id="gridNome">
     <h3 id="nome">Julia Renata</h3> 
     <h3 id="turma">2INFO2</h3> 
   </div>

 </div>


 <div class="ui grid divider"></div>


 <div class="ui grid">
  <div class="one wide column" ></div>
  <div class="seven wide column" id="perguntasRealizadas" >
    <div class="ui center aligned segment"><h3>Perguntas realizadas</h3>

    <div class="ui vertical segment">
          <a href="pergunta.php" style="color: inherit;"><h4>Exemplo 1</h4></a>
          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultric....</p>
    </div>
    <div class="ui vertical segment">
           <a href="pergunta.php" style="color: inherit;"><h4>Exemplo 2</h4></a>
          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultric....</p>
    </div>
    </div>

        

  </div>
  <div class="seven wide column" id="pergutasComentadas" >
    <div class="ui center aligned segment"><h3>Perguntas comentadas</h3>

    <div class="ui vertical segment">
           <a href="pergunta.php" style="color: inherit;"><h4>Exemplo 1</h4></a>
          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultric....</p>
    </div>
    <div class="ui vertical segment">
           <a href="pergunta.php" style="color: inherit;"><h4>Exemplo 2</h4></a>
          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultric....</p>
    </div>
  </div>
</div>
  <div class="one wide column"></div>
</div>



<footer>
  <?php include'footer_smallpage.php' ?>
</footer>

</body>
</html>







