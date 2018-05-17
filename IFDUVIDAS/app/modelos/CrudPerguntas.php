<?php 

require_once "Pergunta.php";
require_once "BDConection.php";

/**
* 
*/
class CrudPerguntas
{
	
 		public function __construct()
    {
        $this->conexao = BDConection::getConexao();
    }

        public function getPerguntas()
    {

        $sql = "select * from perguntas order by titulo";
        $resultado = $this->conexao->query($sql);
        $listaPerguntas = [];

        $perguntas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($perguntas as $pergunta) {
            $objeto = new Pergunta($pergunta['hora'], $pergunta['data'], $pergunta['descricao_pergunta'], $pergunta['titulo'], $pergunta['disciplina'], $pergunta['id_pergunta'], $pergunta['id_usuario']);

            $listaPerguntas[] = $objeto;
        }
        print_r($listaPerguntas);
    }

    public function insertPergunta(pergunta $pergunta)
    {
        $hora = $pergunta->getHora();
        $data = $pergunta->getData();
        $descricao_pergunta = $pergunta->getDescricaoPergunta();
        $titulo = $pergunta->getTitulo();
        $disciplina = $pergunta->getDisciplina();



        $consulta = "INSERT INTO perguntas (hora, data, descricao_pergunta, titulo, disciplina)  
                      VALUES ('{$hora}', '{$data}', '{$descricao_pergunta}', '{$titulo}', '{$disciplina}')";
        //echo $consulta;
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }

    }

    public function getPergunta($id_pergunta)
    {

        $sql = "SELECT * FROM perguntas WHERE id_pergunta = $id_pergunta";
        $resultado = $this->conexao->query($sql);
        $pergunta = $resultado->fetch(PDO::FETCH_ASSOC);
		$objeto = new Pergunta($pergunta['hora'], $pergunta['data'], $pergunta['descricao_pergunta'], $pergunta['titulo'], $pergunta['disciplina'], $pergunta['id_pergunta'], $pergunta['id_usuario']);

        return $objeto;
    }

    public function updatePergunta(pergunta $pergunta)
    {

        $consulta = "UPDATE perguntas SET hora = '{$pergunta->getHora()}', data = '{$pergunta->getData()}', descricao_pergunta = '{$pergunta->getDescricaoPergunta()}', titulo = '{$pergunta->getTitulo()}' , id_pergunta = '{$pergunta->getIdpergunta()}', id_usuario = '{$pergunta->getDisciplina()}'
 					WHERE id_pergunta={$pergunta->getIdPergunta()}";

        echo $consulta;
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

    public function deletePergunta($id_pergunta)
    {

        $consulta = "DELETE FROM perguntas WHERE id_pergunta = {$id_pergunta}";
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

}

?>