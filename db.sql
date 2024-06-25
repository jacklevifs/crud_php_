CREATE DATABASE prova_juliao;
use prova_juliao;
CREATE TABLE usuarios(
	`id` int not null primary key auto_increment,
    `nome` varchar(255) not null,
    `email` varchar(255) not null,
    `password` varchar(255) not null,
    `nivel_acesso` int not null
);

insert into usuarios(`nome`, `email`, `pasword`, `nivel_acesso`) values ('admin', 'admin@gmail.com', '123', 1);
 
select * from usuarios;