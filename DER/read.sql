-- CRUD (Create, Read, Update, Delete).
-- Read: Pesquisar!

-- COMANDO PARA CONSULTAR (READ)

select * from tb_usuario;

select * from tb_categoria;

select * from tb_empresa;

select * from tb_conta;

select * from tb_movimento;

select * from tb_categoria where id_usuario = 1;

select * from tb_categoria where id_usuario = 2;

select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like 'A%';

select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like '%A';

select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like '%A%';