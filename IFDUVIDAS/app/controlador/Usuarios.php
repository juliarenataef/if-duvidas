<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
require_once (realpath(dirname(__FILE__) . '/../modelos/CrudUsuarios.php'));
require_once (realpath(dirname(__FILE__) .  '/../modelos/CrudPerguntas.php'));
require_once (realpath(dirname(__FILE__) .  '/../modelos/CrudComentarios.php'));
require_once (realpath(dirname(__FILE__) .  '/../modelos/crudRespostas.php'));
require_once (realpath(dirname(__FILE__) .  '/../modelos/BDConection.php'));
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

            if(isset($_FILES["foto_perf"])){
            $Nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $email = $_POST['email'];
            $data_nasc = $_POST['data_nasc'];
            $turma = $_POST['turma'];
            $cod_tip = $_POST['cod_tip'];

            $arquivo = $_FILES["foto_perf"];
            $pasta_dir = "fotos/";

            $arquivo_nome = $pasta_dir . $arquivo["name"];
            move_uploaded_file($_FILES["foto_perf"]["tmp_name"], $arquivo_nome);

            $novoUsuario = new Usuario($Nome, $senha, $email, $data_nasc, $turma, $cod_tip);

            $crud = new CrudUsuarios();
            $crud->insertUsuario($novoUsuario, $arquivo_nome);



        };
            
            
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
                $_SESSION['turma'] = $usuario['turma'];
                
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

        $id_usuario = $_GET['id_usuario'];

        if (isset($_GET['cod_tip'])) {
            $cod_tip = $_GET['cod_tip'];
        }elseif ($_GET['id_usuario'] = $_SESSION['id_usuario']) {
            $cod_tip = $_SESSION['cod_tip'];
        }else{
            echo "erro";
        }
         

        $crud1= new CrudUsuarios();
        $usuario = $crud1->getUsuario($id_usuario);
        
        $crud = new CrudPerguntas();
        $numDePergutas = $crud->getNumPerguntasFeitas($id_usuario);

        $perguntas = $crud->getPerguntasPorUsuario($id_usuario);

        $crud2 = new CrudRespostas();
        $respostas = $crud2->getPerguntaRespondidasPorProf($id_usuario);

        include '../visualizacao/head.php';
        include '../visualizacao/paginaUsuario.php';        
      
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



        case 'busca':
            $busca = $_POST['pesquisa'];

            
            $crud = new CrudPerguntas();
            $perguntas = $crud->busca($busca); 
            

            include '../visualizacao/head.php';
            include '../visualizacao/perguntasPorBusca.php';
            include '../visualizacao/footer.php';
            break;


        case 'pergunta':
            $id_pergunta = $_GET['id_pergunta'];
            
            $crud = new CrudPerguntas();
            $pergunta = $crud->getPergunta($id_pergunta);

            $crud3 = new CrudRespostas();
            $respostas = $crud3->getRespostas($id_pergunta);

            $crud4 = new CrudComentarios();
            $comentarios = $crud4->getComentarios($id_pergunta);
            
            $numDeCurtidas = $crud->getCurtidas($id_pergunta);

            if (isset($_SESSION['id_usuario']) ) {
                $id_usuario = $_SESSION['id_usuario'];
                $novaCurtida = $crud->curtir($id_pergunta,$id_usuario);
            }; 

            $data = gmdate("Y-m-d");

            if (isset($_POST['texto_comentario'])) {
                $texto_comentario = $_POST['texto_comentario'];
                $novoComentario = new Comentario($data, $texto_comentario,$id_usuario,$id_pergunta);

                $crud5 = new CrudComentarios();
                $crud5->insertComentario($novoComentario);
                header("Refresh: 0");
                break;
            };

            if (isset($_POST['texto_resposta'])) {
                $texto_resposta = $_POST['texto_resposta'];

                $novaResposta = new Resposta($data, $texto_resposta,$id_usuario,$id_pergunta);


                $crud6 = new crudRespostas();
                $crud6->insertResposta($novaResposta);

                if ($novaResposta) {
                $crud = new CrudPerguntas();
                $crud->updatePerguntaRespondida($id_pergunta);
                header("Refresh: 0");
                break;
            };

            }

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
            $crud = new CrudPerguntas();
            $perguntas = $crud->perguntasMaisCurtidas();

            break;

        case 'perguntasMaisComentadas':
            $crud = new CrudPerguntas();
            $perguntas = $crud->perguntasMaisComentadas();
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

        
    };
            
            
            






