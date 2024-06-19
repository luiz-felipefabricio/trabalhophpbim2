USE projeto;
 

    CREATE TABLE musica (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    letra VARCHAR(255) NOT NULL
);

SELECT * FROM musica;

CREATE TABLE artista (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    nomeartistico VARCHAR(50) NOT NULL,
    datanascimento DATE NOT NULL,
    biografia VARCHAR(255) NOT NULL,
    origem VARCHAR(100) NOT NULL
);


CREATE TABLE login (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    senha VARCHAR(20) NOT NULL
);


CREATE TABLE publicacao (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    artista_id INTEGER  NOT NULL,
    musica_id INTEGER NOT NULL, 
    FOREIGN KEY (artista_id) REFERENCES artista (id) ON DELETE CASCADE,
    FOREIGN KEY (musica_id) REFERENCES musica (id) ON DELETE CASCADE
);


SELECT a.nome, m.nome AS nomedamusica
FROM publicacao p
JOIN artista a ON p.artista_id = a.id
JOIN musica m ON p.musica_id = m.id;



