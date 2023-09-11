# Crud_Ryu
Crud para estudo em php puro, javascript, css, html,jquery e MySql

Para funcionamento do CRUD precisa criar o banco de dados "bd_projeto"

--Criar a tabela tb_usuarios
CREATE TABLE tb_usuarios (
    id int(3) primary key AUTO_INCREMENT,
    nome varchar(60),
    nome_acesso varchar(40),
    cpf varchar(11),
    situacao varchar(1)
);
