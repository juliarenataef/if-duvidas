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

        $sql = "SELECT * FROM perguntas as p, usuarios as u WHERE p.id_usuario=u.id_usuario and p.id_pergunta = $id_pergunta";
        $resultado = $this->conexao->query($sql);
        $pergunta = $resultado->fetch(PDO::FETCH_ASSOC);

        return $pergunta;
    }

    public function updatePergunta(pergunta $pergunta)
    {

        $consulta = "UPDATE perguntas SET hora = '{$pergunta->getHora()}', data = '{$pergunta->getData()}', descricao_pergunta = '{$pergunta->getDescricaoPergunta()}', titulo = '{$pergunta->getTitulo()}', curso = '{$pergunta->getCurso()}' , curso = '{$pergunta->getStatus()}' , id_pergunta = '{$pergunta->getIdpergunta()}', materia = '{$pergunta->getMateria()}'
 					WHERE id_pergunta={$pergunta->getIdPergunta()}";

        
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
        $perguntas = $resultado->fetchAll(PDO::FETCH_ASSOC);

      return $perguntas;
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
        $sql = "SELECT p.id_pergunta,p.descricao_pergunta, p.titulo, p.status from perguntas as p, aluno_comenta as c where c.id_pergunta = p.id_pergunta GROUP by c.id_pergunta ORDER by COUNT(c.id_comentario)";
        $resultado = $this->conexao->query($sql);

        $perguntas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $perguntas;
    }


    public function perguntasMaisCurtidas()
    {
        $sql = "SELECT p.id_pergunta,p.descricao_pergunta, p.titulo from perguntas as p, curtida as c where p.id_pergunta = c.id_pergunta GROUP by c.id_pergunta ORDER by COUNT(p.curtidas)";
        $resultado = $this->conexao->query($sql);

        $perguntas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $perguntas;
    }

    public function getNumPerguntasFeitas($id_usuario){
        $sql = "select COUNT(p.id_pergunta) as numeroDePerguntas from perguntas as p, usuarios as u where u.id_usuario=p.id_usuario and u.id_usuario=$id_usuario";
        $resultado = $this->conexao->query($sql);
        $numeroDePerguntas= $resultado->fetch(PDO::FETCH_ASSOC);

        return $numeroDePerguntas;

    }

    public function getNumPerguntasRespondidas($id_usuario){
        $sql = "select COUNT(p.id_pergunta) as numeroDePerguntas from perguntas as p, usuarios as u where u.id_usuario=p.id_usuario and u.id_usuario=$id_usuario";
        $resultado = $this->conexao->query($sql);
        $numeroDePerguntas= $resultado->fetch(PDO::FETCH_ASSOC);

        return $numeroDePerguntas;

    }

        public function getPerguntasPorUsuario($id_usuario)
    {

        $sql = "SELECT * from perguntas as p, usuarios as u where p.id_usuario = u.id_usuario and u.id_usuario = $id_usuario";
        $resultado = $this->conexao->query($sql);
        

        $perguntas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $perguntas;
    }

    public function updatePerguntaRespondida($id_pergunta)
    {

        $consulta = "update perguntas as p, prof_resposta as r set p.status = 1 where p.id_pergunta = r.id_pergunta and p.id_pergunta = $id_pergunta";

        
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
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

            function getCurtidas($id_pergunta)
    {
            $sql ="SELECT sum(curtidas) AS NumeroDeCurtida FROM perguntas where id_pergunta= '{$id_pergunta}'";
            $resultado = $this->conexao->query($sql);
            $curtidas = $resultado->fetch(PDO::FETCH_ASSOC);
            
           
            return $curtidas ;
    }

}

?>