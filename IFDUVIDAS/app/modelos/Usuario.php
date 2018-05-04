<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/05/18
 * Time: 15:31
 */

class Usuario
{
    private $Nome;
    private $senha;
    private $email;
    private $num_matricula;
    private $data_nasc;
    private $turma;
    private $RG;
    private $foto_perf;
    private $login;
    private $id_usuario;
    private $valido;
    private $cod_tip;



    public function __construct($Nome, $senha, $email, $num_matricula, $data_nasc, $turma, $RG, $foto_perf, $login, $valido, $id_usuario = null)
    {

        $this->Nome = $Nome;
        $this->senha = $senha;
        $this->email = $email;
        $this->num_matricula = $num_matricula;
        $this->data_nasc = $data_nasc;
        $this->turma = $turma;
        $this->RG = $RG;
        $this->foto_perf = $foto_perf;
        $this->login = $login;
        $this->id_usuario = $id_usuario;
        $this->valido = $valido;

    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * @param mixed $Nome
     */
    public function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNumMatricula()
    {
        return $this->num_matricula;
    }

    /**
     * @param mixed $num_matricula
     */
    public function setNumMatricula($num_matricula)
    {
        $this->num_matricula = $num_matricula;
    }

    /**
     * @return mixed
     */
    public function getDataNasc()
    {
        return $this->data_nasc;
    }

    /**
     * @param mixed $data_nasc
     */
    public function setDataNasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;
    }

    /**
     * @return mixed
     */
    public function getTurma()
    {
        return $this->turma;
    }

    /**
     * @param mixed $turma
     */
    public function setTurma($turma)
    {
        $this->turma = $turma;
    }

    /**
     * @return mixed
     */
    public function getRG()
    {
        return $this->RG;
    }

    /**
     * @param mixed $RG
     */
    public function setRG($RG)
    {
        $this->RG = $RG;
    }

    /**
     * @return mixed
     */
    public function getFotoPerf()
    {
        return $this->foto_perf;
    }

    /**
     * @param mixed $foto_perf
     */
    public function setFotoPerf($foto_perf)
    {
        $this->foto_perf = $foto_perf;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
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
    public function getValido()
    {
        return $this->valido;
    }

    /**
     * @param mixed $valido
     */
    public function setValido($valido)
    {
        $this->valido = $valido;
    }

    /**
     * @return mixed
     */
    public function getCodTip()
    {
        return $this->cod_tip;
    }

    /**
     * @param mixed $cod_tip
     */
    public function setCodTip($cod_tip)
    {
        $this->cod_tip = $cod_tip;
    }


}
