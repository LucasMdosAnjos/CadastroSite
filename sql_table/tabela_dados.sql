USE db_dados;

CREATE TABLE IF NOT EXISTS tb_info(
	idusuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    desnome VARCHAR(64) NOT NULL,
    desendereco VARCHAR(256) ,
    desbairro VARCHAR(20) ,
    descep VARCHAR(20),
    desuf VARCHAR(15),
    desemail VARCHAR(30) NOT NULL,
    destelefone VARCHAR(30) NOT NULL,
    destiporevistinha VARCHAR(35),
    desquantidade VARCHAR(10),
    desatracao VARCHAR(200),
    dessugestao VARCHAR(30),
    descidade VARCHAR(20),
    desimagem LONGBLOB
);
