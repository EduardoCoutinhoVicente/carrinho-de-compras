CREATE DATABASE carrinho;
use carrinho;

CREATE TABLE cursos (
id_cursos int not null auto_increment primary key,
nome_cursos varchar(100) not null,
preco_cursos int not null,
quantidade int not null
);

