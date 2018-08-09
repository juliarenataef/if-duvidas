<?php 
require_once "BDConection.php";

         function getCurtida($id_pergunta)
    {
            $sql =("SELECT sum(curtidas) AS NumeroDeCurtida FROM perguntas where id_pergunta= '{$id_pergunta}'");
            
            $curtidas =  $this->conexao->exec($sql);
            print_r($curtidas) ;
    }

             function curtir($id_pergunta, $id_usuario)
    {
            $sql = "update perguntas set curtidas = curtidas+1 where id_pergunta='{$id_pergunta}'";

            $atualizar_curtidas = $this->conexao->exec($sql);

            if ($atualizar_curtidas) {
                $inserir_curtida = $this->conexao->exec("insert into curtida (id_usuario, id_pergunta) values ('{$id_usuario}','{$id_pergunta}')");
            if ($inserir_curtida) {
                return true;
            }else{
                return false;
            }
            

    }
}
 ?>