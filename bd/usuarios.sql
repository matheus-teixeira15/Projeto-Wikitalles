CREATE TABLE usuarios 
( 
    id integer(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nome varchar(25), 
    email varchar(50), 
    senha varchar(100) 
);

ALTER TABLE usuarios AUTO_INCREMENT=100;
