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
        return $perguntas;
    }

    public function insertPergunta(pergunta $pergunta)
    {
        $hora = $pergunta->getHora();
        $data = $pergunta->getData();
        $descricao_pergunta = $pergunta->getDescricaoPergunta();
        $titulo = $pergunta->getTitulo();
        $materia = $pergunta->getmateria();
        $curso = $pergunta->getcurso();
        $id_usuario = $pergunta->getIdUsuario();


        $consulta = "INSERT INTO perguntas (hora, data, descricao_pergunta, titulo, materia, curso, id_usuario)  
                      VALUES ('{$hora}', '{$data}', '{$descricao_pergunta}', '{$titulo}', '{$materia}', '{$curso}', '{$id_usuario}')";
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

        return $pergunta;
    }

    public function updatePergunta(pergunta $pergunta)
    {

        $consulta = "UPDATE perguntas SET hora = '{$pergunta->getHora()}', data = '{$pergunta->getData()}', descricao_pergunta = '{$pergunta->getDescricaoPergunta()}', titulo = '{$pergunta->getTitulo()}', curso = '{$pergunta->getCurso()}' , curso = '{$pergunta->getStatus()}' , id_pergunta = '{$pergunta->getIdpergunta()}', materia = '{$pergunta->getMateria()}'
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

        public function busca($busca)
    {


        $sql = "SELECT id_pergunta, titulo, descricao_pergunta, status FROM perguntas
        WHERE MATCH (titulo, descricao_pergunta) AGAINST ('{$busca}');";
        $resultado = $this->conexao->query($sql);
        $pesquisa = $resultado->fetch(PDO::FETCH_ASSOC);

        return $pesquisa;

    }

    public function perguntasRespondidas()
    {
        $sql = "SELECT * FROM perguntas where status = 1";
            $resultado = $this->conexao->query($sql);
            $listaPerguntas = [];

            $listaPerguntas = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $listaPerguntas;
    }

    public function perguntasMaisComentadas()
    {
        $sql = "SELECT * from perguntas as p, aluno_comenta as c where c.id_pergunta = p.id_pergunta ORDER by COUNT(c.id_comentario)";
    }

}

?>