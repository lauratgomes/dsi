create table noticia (
	id 		SERIAL 	PRIMARY KEY,
	titulo		VARCHAR(100),
	descricao 	VARCHAR(100),
	autor		VARCHAR(50),
	data_hora	CHAR(16)
);
