-- CRUD (Create, Read, Update, Delete).
-- Delete: Excluir!

-- Realiza a exclusão de TODO o Banco de Dados!
DROP DATABASE db_exemplo;

-- Realiza a exclusão de umma Tabela do Banco de Dados!
DROP TABLE db_exemplo;

DELETE FROM tb_usuario WHERE id_usuario = 1;

DELETE FROM tb_categoria WHERE id_categoria = 1;

DELETE FROM tb_movimento WHERE id_movimento in (1, 2, 3, 4, 5);