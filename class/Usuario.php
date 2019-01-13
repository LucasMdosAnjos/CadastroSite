<?php

class Usuario 
{
	private $idusuario;
	private $nome;
	private $endereco;
	private $bairro;
	private $cep;
	private $cidade;
	private $uf;
	private $email;
	private $telefone;
	private $tipo_revistinha;
	private $quantidade;
	private $atracoes;
	private $sugestao;
	private $image;
	private $file;
	private $campo;

	public function setIdUsuario($id)
	{
		$this->idusuario = $id;
	}
	public function getIdUsuario()
	{
		return $this->idusuario;
	}
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	public function getNome()
	{
		return $this->nome;
	}
	public function setEndereco($endereco=array())
	{
		$this->endereco = $endereco;
	}
	public function getEndereco()
	{
		return $this->endereco;
	}
	public function setBairro($bairro=array())
	{
		$this->bairro = $bairro;
	}
	public function getBairro()
	{
		return $this->bairro;
	}
	public function setCep($cep=array())
	{
		$this->cep = $cep;
	}
	public function getCep()
	{
		return $this->cep;
	}
	public function setCidade($cidade=array())
	{
		$this->cidade = $cidade;
	}
	public function getCidade()
	{
		return $this->cidade;
	}
	public function setUf($uf=array())
	{
		$this->uf = $uf;
	}
	public function getUf()
	{
		return $this->uf;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function getEmail()
	{
		return $this->email;
	}
		public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}
	public function getTelefone()
	{
		return $this->telefone;
	}
		public function setTipoRevistinha($tipo_revistinha=array())
	{
		$this->tipo_revistinha = $tipo_revistinha;
	}
	public function getTipoRevistinha()
	{
		return $this->tipo_revistinha;
	}
		public function setQuantidade($quantidade=array())
	{
		$this->quantidade = $quantidade;
	}
	public function getQuantidade()
	{
		return $this->quantidade;
	}

	public function setAtracoes($atracoes=array())
	{
		$this->atracoes = $atracoes;
	}
	public function getAtracoes()
	{
		return $this->atracoes;
	}
	public function setSugestao($sugestao=array())
	{
		$this->sugestao = $sugestao;
	}
	public function getSugestao()
	{
		return $this->sugestao;
	}
		public function setImage($image=array())
	{
		$this->image = $image;
	}
	public function getImage()
	{
		return $this->image;
	}
			public function setFile($file=array())
	{
		$this->file = $file;
	}
	public function getFile()
	{
		return $this->file;
	}
	private function setCampo($campo)
	{
		$this->campo = $campo;
	}
	private function getCampo()
	{
		return $this->campo;
	}

	
	public function loadById($id)
	{
		$sql = new Sql();
		$result = $sql->select("SELECT * FROM tb_info WHERE idusuario = :ID", 
			array(":ID"=>$id));
		if(count($result)> 0 )
		{
			$this->setData($result[0]);
		}
	}
	public static function getList()
	{
		$sql = new Sql();
		return $sql->select("SELECT idusuario, desnome,destelefone FROM tb_info ORDER BY idusuario");
	}
	public static function search($nome) 
	{
		$sql = new Sql();
		return $sql->select("SELECT *FROM tb_usuarios WHERE desnome = :NOME",array(":NOME"=>$nome));
	}

	public function setData($data)
	{
			$this->setIdUsuario($data['idusuario']);
			$this->setNome($data['desnome']);
			$this->setBairro($data['desbairro']);
			$this->setCep($data['descep']);
			$this->setCidade($data['descidade']);
			$this->setEndereco($data['desendereco']);
			$this->setEmail($data['desemail']);
			$this->setUf($data['desuf']);
			$this->setTelefone($data['destelefone']);
			$this->setTipoRevistinha($data['destiporevistinha']);
			$this->setQuantidade($data['desquantidade']);
			$this->setAtracoes($data['desatracao']);
			$this->setSugestao($data['dessugestao']);
			$this->setImage($data['desimagem']);
	}
	

	public function insert()
	{
		$sql = new Sql();
		if($this->getFile()!=NULL)
		{
			$image = addslashes(file_get_contents($this->getFile()['tmp_name']));
			$this->setImage($image);
		$results = $sql->select("INSERT INTO tb_info(desnome,desendereco,desbairro,descep,desuf,desemail,destelefone,destiporevistinha,desquantidade,desatracao,dessugestao,descidade,desimagem) VALUES(:NOME,:ENDERECO,:BAIRRO,:CEP,:UF,:EMAIL,:TELEFONE,:TIPOREVISTINHA,:QUANTIDADE,:ATRACAO,:SUGESTAO,:CIDADE,:IMAGE)", array(
			':NOME'=>$this->getNome()
			,':ENDERECO'=>$this->getEndereco(),
			':BAIRRO'=>$this->getBairro(),
			':CEP'=>$this->getCep(),
			':UF'=>$this->getUf(),
			':EMAIL'=>$this->getEmail(),
			':TELEFONE'=>$this->getTelefone(),
			':TIPOREVISTINHA'=>$this->getTipoRevistinha(),
			':QUANTIDADE'=>$this->getQuantidade(),
			':ATRACAO'=>$this->getAtracoes(),
			':SUGESTAO'=>$this->getSugestao(),
			':CIDADE'=>$this->getCidade(),
			':IMAGE'=>$this->getImage()
		));
		$results2 = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = LAST_INSERT_ID()");
		if(count($results2) > 0)
		{
			$this->setData($results2[0]);
		}
	}
}
public function update($id,$campo,$value)
	{
		$sql = new Sql();
		$this->setCampo($campo);
		$sql->query("UPDATE tb_info SET ".$this->getCampo()." = :VALUE WHERE idusuario = :ID",array(
			":VALUE"=>$value,
			":ID"=>$id
		));
	}

	public function __toString()
	{
		return json_encode(array(
			'Nome'=>$this->getNome(),
			'Endereço'=>$this->getEndereco(),
			'Bairro'=>$this->getBairro(),
			'Cep'=>$this->getCep(),
			'Uf'=>$this->getUf(),
			'Email'=>$this->getEmail(),
			'Telefone'=>$this->getTelefone(),
			'Tipo de Revistinha'=>$this->getTipoRevistinha(),
			'Quantidade'=>$this->getQuantidade(),
			'Lista de Atrações'=>$this->getAtracoes(),
			'Sugestão'=>$this->getSugestao(),
			'Cidade'=>$this->getCidade()));
	}
}
?>