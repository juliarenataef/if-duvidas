<?php 

	class Resposta
	{		
		private $data_resposta;
		private $texto_resposta;		
		private $id_resposta;
		private $id_pergunta;
		private $id_usuario; 

		
		public function __construct($data_resposta, $texto_resposta, $id_usuario, $id_pergunta)
		{
			$this->data_resposta = $data_resposta;
			$this->texto_resposta = $texto_resposta;
			$this->id_usuario = $id_usuario;
			$this->id_pergunta = $id_pergunta;
		}

		public function getData_resposta()
		{
		    return $this->data_resposta;
		}
		
		public function setData_resposta($data_resposta)
		{
		    return $this->data_resposta = $data_resposta;
		}

		public function getTexto_resposta()
		{
		    return $this->texto_resposta;
		}
		
		public function setTexto_resposta($texto_resposta)
		{
		    return $this->texto_resposta = $texto_resposta;
		}

		public function getId_resposta()
		{
		    return $this->id_resposta;
		}
		
		public function setId_resposta($id_resposta)
		{
		    return $this->id_resposta = $id_resposta;
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