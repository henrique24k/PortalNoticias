create database noticias;
use noticias;

create table usuario(
	id int(2) auto_increment,
    email varchar(140), 
    senha varchar(16),
    primary key (id)
);

create table colunista(
	id int(2) auto_increment,
    email varchar(100),
    senha varchar(30),
    primary key (id)
);

create table arquivos(
	id int auto_increment,
    nome varchar(60),
    path varchar(100),
    data_upload datetime,
    primary key (id)
);

insert into usuario(email, senha) values ('teste@teste.com', '1234');
insert into usuario(email, senha) values ('teste@teste.com', 'H1234');

select * from usuario;
select * from colunista;

insert into colunista(email, senha) values ('colunista@teste.com', '1234');

delete from arquivos where id = 1;
select * from arquivos;
drop table arquivos;