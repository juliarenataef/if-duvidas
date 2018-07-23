<?php 
class Pergunta
{
	private $hora;
	private $data;
	private $descricao_pergunta;
	private $titulo;
	private $materia;
    private $curso;
    private $status;
	private $id_pergunta;
	private $id_usuario;


    public function __construct($hora, $data, $descricao_pergunta, $titulo, $materia, $curso, $id_usuario = null)
    {

        $this->hora = $hora;
        $this->data = $data;
        $this->descricao_pergunta = $descricao_pergunta;
        $this->titulo = $titulo;
        $this->materia = $materia;
        $this->curso = $curso;
        $this->id_usuario = $id_usuario;
    }

        public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $Nome
     */
    public function set($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $senha
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getDescricaoPergunta()
    {
        return $this->descricao_pergunta;
    }

    /**
     * @param mixed $email
     */
    public function setDescricaoPergunta($descricao_pergunta)
    {
        $this->descricao_pergunta = $descricao_pergunta;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $num_matricula
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * @param mixed $data_nasc
     */
    public function setMateria($materia)
    {
        $this->materia = $materia;
    }

        /**
     * @return mixed
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * @param mixed $data_nasc
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;
    }

    public function getStatus()
    {
        return $this->status;
    }
    
    public function setStatus($status)
    {
        return $this->status = $status;
    }

 public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdPergunta()
    {
        return $this->id_pergunta;
    }

    /**
     * @param mixed $cod_tip
     */
    public function setIdPergunta($id_pergunta)
    {
        $this->id_pergunta = $id_pergunta;
    }


}



?>