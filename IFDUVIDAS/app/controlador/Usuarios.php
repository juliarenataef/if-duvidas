<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
require_once '../modelos/CrudUsuarios.php';
require '../visualizacao/head.php';


if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao) {

    case 'index':


        include '../visualizacao/head.php';
        include '../visualizacao/index.php';
        include '../visualizacao/footer.php';
        break;


    case 'cadastrar';
        if (!isset($_POST['gravar'])) { // se ainda nao tiver preenchido o form
            include '../visualizacao/head.php';
            include '../visualizacao/cadastro.php';
            include '../visualizacao/footer.php';
        } else {

            // depois de preencher o formulario

            $Nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $email = $_POST['email'];
            $num_matricula = $_POST['num_matricula'];
            $data_nasc = $_POST['data_nasc'];
            $turma = $_POST['turma'];
            $RG = $_POST['RG'];
            $foto_perf = $_POST['foto_perf'];
            $login = $_POST['login'];
            $id_usuario = $_POST['id_usuario'];
            $valido = $_POST['valido'];
            $cod_tip = $_POST['cod_tip'];

            $novoUsuario = new Usuario($Nome, $senha, $email, $num_matricula, $data_nasc, $turma, $RG, $foto_perf, $login, $id_usuario, $valido, $cod_tip);

            $crud = new CrudUsuarios();
            $crud->insertUsuario($novoUsuario);

            header('location: Usuarios.php');
        }
        break;


    case 'login':
        if (!isset($_POST['entrar'])) { //primeiro clique - exibir formulario
            include '../visualizacao/login.php';
        } else { //depois de clicar em entrar
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $crud = new CrudUsuarios();
            $usuario = $crud->login($email, $senha);
            var_dump($usuario);
            if ($usuario) { //se deu certo o login
                $_SESSION['id_usuario'] = $usuario->getIdUsuario();
                $_SESSION['Nome'] = $usuario->getNome();
                $_SESSION['email'] = $usuario->getEmail();
                header('location: Usuarios.php');
            } else {

                echo "dados incorretos";
            }


        }

        break;

    case 'logout':
        session_destroy();
       header('location: Usuarios.php');
        break;

        case 'paginaDoUsuario':
        header('location:../visualizacao/usuario.php');
                $_SESSION['id_usuario'] = $usuario->getIdUsuario();
                $_SESSION['Nome'] = $usuario->getNome();
                $_SESSION['email'] = $usuario->getEmail();
            break;
            }
            
            






