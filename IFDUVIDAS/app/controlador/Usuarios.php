<?php
session_start();
require_once '../modelos/CrudUsuarios.php';


if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao) {

    case 'index':

        $crud = new CrudUsuarios();
        $usuarios = $crud->getUsuarios();

//            include '../views/usuarios/cabecalho.php';
        include '../visualizacao/Usuarios/index.php';
//            include '../views/usuarios/rodape.php';
        break;


    case 'inserir';
        if (!isset($_POST['gravar'])) { // se ainda nao tiver preenchido o form
//                include '../views/usuarios/cabecalho.php';
            include '../visualizacao/Usuarios/telaCadastrar.html';
//                include '../views/usuarios/rodape.php';
        } else {

            // depois de preencher o formulario

            $nome = $_POST['Nome'];
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

            header('Location: usuario.php');
        }
        break;


    case 'login':
        if (!isset($_POST['entrar'])) { //primeiro clique - exibir formulario
            include '../visualizacao/Usuarios/telaLogin.html';
        } else { //depois de clicar em entrar
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $crud = new CrudUsuarios();
            $usuario = $crud->login($login, $senha);
            var_dump($usuario);
            if ($usuario) { //se deu certo o login
                $_SESSION['id_usuario'] = $usuario->getIdUsuario();
                $_SESSION['Nome'] = $usuario->getNome();
                $_SESSION['login'] = $usuario->getLogin();
                header('location: Usuarios.php');
            } else {

                header('location: Usuarios.php?erro=1');
            }


        }

        break;

    case 'logout':
        session_destroy();
        header('location: Usuarios.php');
        break;
}
