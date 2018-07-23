<?php 

require_once "Resposta.php";
require_once "BDConection.php";


class crudRespostas
{

		public function __construct()
    {
        $this->conexao = BDConection::getConexao();
    }

    public function getRespostas()
    {
    	 $sql = "select * from prof_resposta as r, usuarios as u WHERE r.id_usuario=u.id_usuario order by data_resposta";
        $resultado = $this->conexao->query($sql);

        $respostas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $respostas;
    }



    public function insertResposta(resposta $resposta)
    {
        $data_resposta = $resposta->getData_resposta();
        $texto_resposta = $resposta->getTexto_resposta();
        $id_usuario = $resposta->getId_Usuario();
        $id_pergunta = $resposta->getId_Pergunta();


        $consulta = "INSERT INTO prof_resposta (data_resposta, texto_resposta, id_usuario, id_pergunta)  
                      VALUES ('{$data_resposta}','{$texto_resposta}','{$id_usuario}','{$id_pergunta}' )";
        try {
            $res = $this->conexao->exec($consulta);
            
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }

    }

        public function getResposta($id_resposta)
    {

        $sql = "SELECT * FROM prof_resposta WHERE id_resposta = $id_resposta";
        $resultado = $this->conexao->query($sql);
        $resposta = $resultado->fetch(PDO::FETCH_ASSOC);
		$objeto = new resposta($resposta['data_resposta'], $resposta['texto_resposta'], $resposta['id_resposta'], $resposta['id_pergunta'], $resposta['id_usuario']);

        return $objeto;
    }

    public function updateResposta(resposta $resposta)
    {

        $consulta = "UPDATE prof_resposta SET data_resposta = '{$resposta->getData_resposta()}', texto_resposta = '{$resposta->getTexto_resposta()}', id_resposta = '{$resposta->getId_resposta()}'
 					WHERE id_resposta={$resposta->getId_resposta()}";

        echo $consulta;
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

     public function deleteResposta($id_resposta)
    {

        $consulta = "DELETE FROM prof_resposta WHERE id_resposta = {$id_resposta}";
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }



	}

 ?>