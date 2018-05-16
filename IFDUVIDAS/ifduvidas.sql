



CREATE TABLE Usuarios (
Nome varchar(30),
senha varchar(30),
email varchar(50),
num_matricula int (10),
data_nasc date,
turma varchar(30),
RG varchar(30),
foto_perf blob,
login varchar(30),
id_usuario int PRIMARY KEY NOT NULL AUTO_INCREMENT,
valido boolean,
cod_tip int
);

CREATE TABLE Perguntas (
hora time,
data date,
descricao_pergunta varchar(150),
titulo varchar(30),
disciplina varchar(30),
id_pergunta int PRIMARY KEY NOT NULL AUTO_INCREMENT,
 id_usuario int,
FOREIGN KEY( id_usuario) REFERENCES Usuarios (id_usuario)
);

CREATE TABLE tip_user (
cod_tip int PRIMARY KEY,
desc_tip_user varchar(30)
);

CREATE TABLE prof_resposta (
id_pergunta int,
id_usuario int,
data_resposta date,
texto_resposta varchar(150),
id_resposta int PRIMARY KEY NOT NULL AUTO_INCREMENT,
FOREIGN KEY(id_pergunta) REFERENCES Perguntas (id_pergunta),
FOREIGN KEY(id_usuario) REFERENCES Usuarios (id_usuario)
);

CREATE TABLE aluno_comenta (
id_pergunta int,
id_usuario int,
data_comentario date,
texto_comentario varchar(150),
status boolean,
id_comentario int PRIMARY KEY NOT NULL AUTO_INCREMENT,
FOREIGN KEY(id_pergunta) REFERENCES Perguntas (id_pergunta),
FOREIGN KEY(id_usuario) REFERENCES Usuarios (id_usuario)
);

CREATE TABLE curtida (
id_usuario int,
id_resposta int,
id_pergunta int,
id_comentario int,
data date,
status boolean,
FOREIGN KEY(id_usuario) REFERENCES Usuarios (id_usuario),
FOREIGN KEY(id_resposta) REFERENCES prof_resposta (id_resposta),
FOREIGN KEY(id_pergunta) REFERENCES Perguntas (id_pergunta),
FOREIGN KEY(id_comentario) REFERENCES aluno_comenta (id_comentario)
);

ALTER TABLE Usuarios ADD FOREIGN KEY(cod_tip) REFERENCES tip_user (cod_tip);
