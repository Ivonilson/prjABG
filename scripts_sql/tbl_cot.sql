create table tbl_cot(
    id int(8) PRIMARY KEY AUTO_INCREMENT,
    versao varchar(60),
    item varchar(100) NOT NULL UNIQUE,
    titulo varchar(100),
    descricao varchar (3000),
    observacoes varchar(3000),
    data_cadastro timestamp,
    usuario varchar(60)

) engine=innoDB;