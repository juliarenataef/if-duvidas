<?php 
	require_once '../modelos/CrudPerguntas.php';
	require_once '../modelos/BDConection.php';

	$busca = $_GET['q'];
            //$busca = mysql_real_escape_string($busca);

            if($busca == null){ 
            header("location: Usuarios.php");
            }
            $sql = mysql_query("SELECT * FROM Pergunta WHERE titulo LIKE '%".$busca."%' ");

            $conta = mysql_num_rows($sql);

            if($conta == 0){
            echo "Não há notícias relacionadas à ".$busca."";
            }else{
            echo "<ul>";
            while($Pergunta = mysql_fetch_object($sql)){
            $titulo = $pergunta->titulo;
            $link = "http://site.com/noticia.php?id=".$noticia->id."";
            echo "<li><a href=\"".$link."\">".$titulo."</a></li>";
            }
            echo "</ul>";
            }

 ?>