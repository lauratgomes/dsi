CREATE TABLE noticia (
	id 			SERIAL 	PRIMARY KEY,
	titulo		VARCHAR(100),
	descricao 	VARCHAR(500),
	autor		VARCHAR(50),
	data		DATE,
	imagem		TEXT
);

CREATE TABLE usuario (
	id			SERIAL PRIMARY KEY,
	login		VARCHAR(50),
	senha		VARCHAR(32),
	nome		VARCHAR(50),
	permissao	INTEGER
);

INSERT INTO usuario (login, senha, nome, permissao) VALUES ('admin', 'admin', 'Administrador', 0);
INSERT INTO usuario (login, senha, nome, permissao) VALUES ('lolrona', '123', 'Laura Gomes', 1);
INSERT INTO usuario (login, senha, nome, permissao) VALUES ('raquelita', '123', 'Raquel', 2);
INSERT INTO usuario (login, senha, nome, permissao) VALUES ('lolrinha', '123', 'Laura Dalmolin', 3);