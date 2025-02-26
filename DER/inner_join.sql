-- INNER JOIN: Relatórios com múltiplos dados de múltiplas Tabelas

SELECT * FROM tb_movimento WHERE tipo_movimento = 1;

SELECT * FROM tb_movimento WHERE tipo_movimento = 2;

select nome_usuario, data_cadastro
FROM tb_usuario
WHERE nome_usuario LIKE '%A%';

SELECT nome_usuario, data_cadastro
FROM tb_usuario
WHERE nome_usuario LIKE '%D%';

SELECT nome_usuario, data_cadastro
FROM tb_usuario
WHERE nome_usuario LIKE '%B%';

SELECT data_cadastro, data_movimento
	FROM tb_usuario
INNER JOIN tb_movimento
    ON tb_movimento.id_usuario = tb_usuario.id_usuario
    WHERE data_movimento BETWEEN '2024-01-01' AND '2024-12-20';
    
SELECT nome_usuario, email_usuario, banco_conta, saldo_conta, numero_conta
	FROM tb_usuario
INNER JOIN tb_conta
	ON tb_conta.id_usuario = tb_usuario.id_usuario;
    
SELECT nome_usuario, nome_categoria, nome_empresa, tipo_movimento, data_movimento, valor_movimento
	FROM tb_usuario
INNER JOIN tb_categoria
	ON tb_categoria.id_usuario = tb_usuario.id_usuario
INNER JOIN tb_empresa
	ON tb_empresa.id_usuario = tb_usuario.id_usuario
INNER JOIN tb_movimento
	ON tb_movimento.id_usuario = tb_usuario.id_usuario;
    
SELECT nome_usuario,
	   email_usuario,
       senha_usuario,
       data_cadastro,
       nome_categoria,
       nome_empresa,
       telefone_empresa,
       endereco_empresa,
       banco_conta,
       agencia_conta,
       numero_conta,
       saldo_conta,
       tipo_movimento,
       data_movimento,
       valor_movimento,
       obs_movimento
	FROM tb_usuario as us
INNER JOIN tb_categoria as ctg
	ON ctg.id_usuario = us.id_usuario
INNER JOIN tb_empresa as emp
	ON emp.id_usuario = us.id_usuario
INNER JOIN tb_conta as money
	ON money.id_usuario = us.id_usuario
INNER JOIN tb_movimento as caixa
	ON caixa.id_usuario = us.id_usuario
WHERE us.id_usuario = 2