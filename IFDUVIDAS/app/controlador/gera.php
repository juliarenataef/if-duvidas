<?php
//RECEBEPARÂMETRO 
$id = $_GET['id'];

//CONECTAAO MYSQL 
$conn = mysqli_connect("localhost", "root",
"", "ifduvidas");

//EXIBEIMAGEM 
$sql = mysqli_query($conn, "SELECT foto_perf FROM usuarios as usuarios, perguntas as perguntas WHERE usuarios.id_usuario = perguntas.id_usuario and perguntas.id_pergunta = ".$id."");

$row = mysqli_fetch_array($sql,MYSQLI_ASSOC); 
$bytes = $row["foto_perf"];
//EXIBEIMAGEM 
header("Content-type: image/gif");
echo $bytes;

?>