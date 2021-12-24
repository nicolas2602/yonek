create database php;

create table pessoa(
    id int primary key AUTO_INCREMENT,
    nome varchar(100) not null,
    email varchar(100) not null,
    senha varchar(100) not null
);