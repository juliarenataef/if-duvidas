<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
require_once '../modelos/CrudUsuarios.php';
require_once '../modelos/CrudPerguntas.php';
require_once '../modelos/CrudComentarios.php';
require_once '../modelos/CrudRespostas.php';
require_once '../modelos/BDConection.php';
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
            $data_nasc = $_POST['data_nasc'];
            $turma = $_POST['turma'];
            $RG = $_POST['RG'];
            $foto_perf = $_POST['foto_perf'];
            $cod_tip = $_POST['cod_tip'];

            $novoUsuario = new Usuario($Nome, $senha, $email, $data_nasc, $turma, $RG, $foto_perf, $cod_tip);

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
            if ($usuario) { //se deu certo o login
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['Nome'] = $usuario['Nome'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['cod_tip'] = $usuario['cod_tip'];
            header('location: Usuarios.php');
                           } else {

                echo "dados incorretos";
            };
        }

        break;

    case 'logout':
        session_destroy();
       header('location: Usuarios.php');
        break;

        case 'paginaDoUsuario':
        header('location:../visualizacao/paginaUsuario.php');
        include '../visualizacao/head.php';
                $_SESSION['id_usuario'] = $usuario->getIdUsuario();
                $_SESSION['Nome'] = $usuario->getNome();
                $_SESSION['email'] = $usuario->getEmail();
            break;


        case 'cadastrarPergunta':  
            
            if (!isset($_POST['gravar'])) { // se ainda nao tiver preenchido o form
            include '../visualizacao/head.php';
            include '../visualizacao/cadastrarPergunta.php';
            include '../visualizacao/footer.php';
        } else {
            $data = gmdate("Y-m-d");
            $hora = gmdate("H:i:s");
            $titulo = $_POST['titulo'];
            $descricao_pergunta = $_POST['descricao_pergunta'];
            $materia = $_POST['materia'];
            $curso = $_POST['curso'];
            $id_usuario = $_SESSION['id_usuario'];

            $novaPergunta = new Pergunta($hora,$data,  $descricao_pergunta, $titulo, $materia, $curso ,$id_usuario);

            $crud = new CrudPerguntas();
            $crud->insertPergunta($novaPergunta);


            header('location:Usuarios.php');

        };
        break;



        case 'peguntasPorMateria':

            include '../visualizacao/head.php';
            include '../visualizacao/perguntasPorMateria.php';
            include '../visualizacao/footer.php';
            break;

        case 'peguntasPorCurso':

            include '../visualizacao/head.php';
            include '../visualizacao/perguntasPorCurso.php';
            include '../visualizacao/footer.php';
            break;

        case 'busca':
            $busca = $_POST['pesquisa'];

            include '../visualizacao/head.php';
            include '../visualizacao/perguntasPorBusca.php';
            include '../visualizacao/footer.php';
            break;


        case 'pergunta':
            $id = $_GET['id_pergunta'];

            $crud = new CrudPerguntas();
            $pergunta = $crud->getPergunta($id);

            $crud2 = new CrudUsuarios();
            $usuario = $crud2->getUsuario($id);

            $crud3 = new CrudRespostas();
            $respostas = $crud3->getRespostas();

            $crud4 = new CrudComentarios();
            $comentarios = $crud4->getComentarios($id);
            


            include '../visualizacao/head.php';
            include '../visualizacao/pergunta.php';
            include '../visualizacao/footer.php';

            break;

        case 'perguntasRespondidas':
            $crud = new CrudPerguntas();
            $perguntas = $crud->perguntasRespondidas();

            include '../visualizacao/head.php';
            include '../visualizacao/perguntasRespondidas.php';
            include '../visualizacao/footer.php';

            break;

        case 'perguntasMaisCurtidas':
            
            break;

        case 'perguntasMaisComentadas':
            
            break;

        case 'comentario':

            $id = $_GET['id_pergunta'];

            $crud = new CrudPerguntas();
            $pergunta = $crud->getPergunta($id);

            $crud2 = new CrudUsuarios();
            $usuario = $crud2->getUsuario($id);

            $crud3 = new CrudRespostas();
            $respostas = $crud3->getRespostas();

            $crud4 = new CrudComentarios();
            $comentarios = $crud4->getComentarios($id);

            
            $id_usuario = $_SESSION['id_usuario'];
            $data = gmdate("Y-m-d");
            $texto_comentario = $_POST['texto_comentario'];
            $id_pergunta = $id;

            $novoComentario = new Comentario($data, $texto_comentario,$id_usuario,$id_pergunta);

            $crud5 = new CrudComentarios();
            $crud5->insertComentario($novoComentario);


            include '../visualizacao/head.php';
            include '../visualizacao/pergunta.php';
            include '../visualizacao/footer.php';
        break;

            case 'resposta':

            $id = $_GET['id_pergunta'];

            $crud = new CrudPerguntas();
            $pergunta = $crud->getPergunta($id);

            $crud2 = new CrudUsuarios();
            $usuario = $crud2->getUsuario($id);

            $crud3 = new CrudRespostas();
            $respostas = $crud3->getRespostas();

            $crud4 = new CrudComentarios();
            $comentarios = $crud4->getComentarios($id);

            $id_usuario = $_SESSION['id_usuario'];
            $data = gmdate("Y-m-d");
            $texto_resposta = $_POST['texto_resposta'];
            $id_pergunta = $id;

            $novaResposta = new Resposta($data, $texto_resposta,$id_usuario,$id_pergunta);

            $crud = new CrudRespostas();
            $crud->insertResposta($novaResposta);

            include '../visualizacao/head.php';
            include '../visualizacao/pergunta.php';
            include '../visualizacao/footer.php';
        break;
        
    };
            
            
            






