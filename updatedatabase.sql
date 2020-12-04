use registro_colua;
alter table agencia add soport int not null after nombre;
alter table soporte add cometario varchar(256) not null after problema;
alter table soporte add views int(2) not null after estado;