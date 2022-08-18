create table tbl_cot(
    id int(8) PRIMARY KEY AUTO_INCREMENT,
    versao varchar(60),
    item varchar(100) NOT NULL UNIQUE,
    titulo varchar(300),
    descricao varchar (3000),
    observacoes varchar(3000),
    data_cadastro timestamp,
    alteracoes varchar(5000),
    usuario varchar(60)

) engine=innoDB;

create table tbl_coc(
    id int(8) PRIMARY KEY AUTO_INCREMENT,
    versao varchar(60),
    item varchar(100) NOT NULL UNIQUE,
    titulo varchar(300),
    descricao varchar (3000),
    observacoes varchar(3000),
    data_cadastro timestamp,
    alteracoes varchar(5000),
    usuario varchar(60)

) engine=innoDB;

create table tbl_card(
    id int(8) PRIMARY KEY AUTO_INCREMENT,
    item varchar(100) NOT NULL UNIQUE,
    titulo varchar(300),
    descricao varchar (3000),
    observacoes varchar(3000),
    data_cadastro timestamp,
    alteracoes varchar(5000),
    usuario varchar(60)

) engine=innoDB;