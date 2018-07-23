<?php 

	class Comentario{
		private $data_comentario;
		private $texto_comentario;		
		private $id_comentario;
		private $id_pergunta;
		private $id_usuario;

		public function __construct($data_comentario, $texto_comentario, $id_usuario, $id_pergunta)
		{
			$this->data_comentario = $data_comentario;
			$this->texto_comentario = $texto_comentario;
			$this->id_usuario = $id_usuario;
			$this->id_pergunta = $id_pergunta;
		}

		public function getData_comentario()
		{
		    return $this->data_comentario;
		}
		
		public function setData_comentario($data_comentario)
		{
		    return $this->data_comentario = $data_comentario;
		}

		public function getTexto_comentario()
		{
		    return $this->texto_comentario;
		}
		
		public function setTexto_comentario($texto_comentario)
		{
		    return $this->texto_comentario = $texto_comentario;
		}

		public function getId_comentario()
		{
		    return $this->id_comentario;
		}
		
		public function setId_comentario($id_comentario)
		{
		    return $this->id_comentario = $id_comentario;
		}

		public function getId_pergunta()
		{
		    return $this->id_pergunta;
		}
		
		public function setId_pergunta($id_pergunta)
		{
		    return $this->id_pergunta = $id_pergunta;
		}

		public function getId_usuario()
		{
		    return $this->id_usuario;
		}
		
		public function setId_usuario($id_usuario)
		{
		    return $this->id_usuario = $id_usuario;
		}
	}

 ?>