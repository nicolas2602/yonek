create database php;

create table pessoa (
    id int primary key AUTO_INCREMENT,
    nome varchar(50) not null,
    email varchar(50) not null,
    senha varchar(50) not null
)

INSERT INTO `pessoa` (`nome`, `email`, `senha`) VALUES
('Lucas', 'lucaslotti@gmail.com', '123'),
('Marcus', 'marcusvinicius@gmail.com', '123'),
('Emmanuel', 'emmanuelzague@gmail.com', '123'),
('Carlos', 'carloseduardo@gmail.com', '123'),
('Pajé', 'matheuspaje@gmail.com', '123'),
('Kevin', 'kevinortega@gmail.com', '123'),
('Gabriel', 'gabrielezequiel@gmail.com', '123'),
('Jorck', 'liljorck@gmail.com', '123'),
('Hanne', 'hannestephany@gmail.com', '123');

create table carro(
    IdCarro int primary key AUTO_INCREMENT.
    nomeCarro varchar(100) not null,
    marcaCarro varchar(100) not null,
    anoCarro year(4) not null
);

create table voto(
   IdVoto int primary key AUTO_INCREMENT,
   candidato varchar(100) not null,
   nVotos int(100) NOT null,
   fk_pessoa int,
   foreign key(fk_pessoa) references pessoa(id)
);
create table voto_pessoa(
    IdVPessoa int AUTO_INCREMENT,
    data_voto datetime default now(),
    fk_pessoa int not null,
    fk_voto int not null,
    primary key(IdVPessoa, fk_pessoa, fk_voto),
    foreign key(fk_pessoa) references pessoa(id),
    foreign key(fk_voto) references voto(IdVoto)
)
