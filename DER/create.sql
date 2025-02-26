-- CRUD (Create, Read, Update, Delete).
-- Create: Cadastrar!

-- COMANDO PARA INSERIR
-- insert into nome_tabela (colunas) values (valores)


insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Ana Maria', 'ana_maria@gmail.com', 'ana321', '2024-12-06');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Alisson Rocha', 'alisson_rocha@gmail.com', 'ali333', '2024-12-06');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Murillo Mele', 'murillomele21@gmail.com', 'mele123', '2024-03-21');

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Faculdade', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('NET/Claro', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Financiamento', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Faculdade', 2);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Trabalho', 2);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Trabalho', 2);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Mega colchões', '3322-0000', 'Rod. Celso Garcia', 3);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Fast chicken',  '3322-0098', 'Avenida JK', 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Crazy gym',  '3322-1200', 'Av. Higienópolis', 4);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Telefônica',  '3390-0000', 'Rua Senador Souza Naves', 2);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Top embalagens',  '3322-3333', 'Av. Maringá', 5);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', '2222', '123456', 2500.00, 5);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', '2222', '654321', 2000.00, 2);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itau', '3333', '098765', 500.00, 3);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Caixa econômica', '4444', '876543', 25000.00, 4);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Nubank', '5555', '13579', 80000.00, 1);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values
(1, '2024-12-20', 6500, 'pagamento', 2, 7, 5, 1);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values
(2, '2024-12-20', 2500, 'pagamento', 6, 4, 2, 2)