<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 27/04/18
 * Time: 13:23
 */

require_once "Usuario.php";
require_once "BDConection.php";

class CrudUsuarios
{
    public function __construct()
    {
        $this->conexao = BDConection::getConexao();
    }

    public function getUsuarios()
    {

        $sql = "select * from Usuarios order by Nome ";
        $resultado = $this->conexao->query($sql);
        $listaUsuarios = [];

        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($usuarios as $usuario) {
            $objeto = new Usuario($usuario['Nome'], $usuario['senha'], $usuario['email'], $usuario['num_matricula'], $usuario['data_nasc'], $usuario['turma'], $usuario['RG'],
                $usuario['foto_perf'], $usuario['login'], $usuario['id_usuario'], $usuario['valido'], $usuario['cod_tip']);

            $listaUsuarios[] = $objeto;
        }
        return $listaUsuarios;
    }

    public function insertUsuario(Usuario $usuario)
    {
        $Nome = $usuario->getNome();
        $senha = $usuario->getSenha();
        $email = $usuario->getEmail();
        $numMatricula = $usuario->getNumMatricula();
        $dataNasc = $usuario->getDataNasc();
        $turma = $usuario->getTurma();
        $RG = $usuario->getRG();
        $fotoPerf = $usuario->getFotoPerf();
        $login = $usuario->getLogin();
        $valido = $usuario->getValido();


        $consulta = "INSERT INTO Usuarios (Nome, senha, email, num_matricula, data_nasc, turma, RG, foto_perf, login, valido)  
                      VALUES ('{$Nome}', '{$senha}', '{$email}', '{$numMatricula}', '{$dataNasc}', '{$turma}', '{$RG}', '{$fotoPerf}', '{$login}', '{$valido}')";
        //echo $consulta;
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }

    }

    public function getUsuario($id)
    {

        $sql = "SELECT * FROM Usuarios WHERE id_usuario = $id";
        $resultado = $this->conexao->query($sql);
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
        $objeto = new Usuario($usuario['Nome'], $usuario['senha'], $usuario['email'], $usuario['num_matricula'], $usuario['data_nasc'], $usuario['turma'], $usuario['RG'],
            $usuario['foto_perf'], $usuario['login'], $usuario['id_usuario'], $usuario['valido'], $usuario['cod_tip']);

        return $objeto;
    }

    public function updateUsuario(Usuario $usuario)
    {

        $consulta = "UPDATE Usuarios SET Nome = '{$usuario->getNome()}', senha = '{$usuario->getSenha()}', email = '{$usuario->getEmail()}', num_matricula = '{$usuario->getNumMatricula()}' , data_nasc = '{$usuario->getDataNasc()}', turma = '{$usuario->getTurma()}', RG = '{$usuario->getRG()}', foto_perf = '{$usuario->getFotoPerf()}', 
                                        login = '{$usuario->getLogin()}', id_usuario = '{$usuario->getIdUsuario()}', valido = '{$usuario->getValido()}', cod_tip = '{$usuario->getCodTip()}'
 WHERE id={$usuario->getId()}";

        echo $consulta;
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

    public function deleteUsuario($id)
    {

        $consulta = "DELETE FROM Usuarios WHERE id_usuario = {$id}";
        echo $consulta;
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

    public function login($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha='$senha' ";
        $resultado = $this->conexao->query($sql);
        if ($resultado->rowCount() > 0) {
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
            $objeto = new Usuario($usuario['Nome'], $usuario['senha'], $usuario['email'], $usuario['num_matricula'], $usuario['data_nasc'], $usuario['turma'], $usuario['RG'],
                $usuario['foto_perf'], $usuario['login'], $usuario['id_usuario'], $usuario['valido'], $usuario['cod_tip']);
            return $objeto;
        } else {
            return false;
        }

    }
}
