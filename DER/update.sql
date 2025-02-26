-- CRUD (Create, Read, Update, Delete).
-- Update: Atualizar!

update tb_usuario
	set nome_usuario = 'Pedro Alves'
where id_usuario = 3;

update tb_usuario
	set email_usuario = 'pedro.alves@gmai.com',
		senha_usuario = 'pdr987'
where id_usuario = 3;

update tb_usuario
	set nome_usuario = 'Murillo Mele',
		email_usuario = 'murillomele21@gmail.com',
        senha_usuario = 'mu213'
where id_usuario = 5;

update tb_empresa
	set nome_empresa = 'Chevrolet',
		telefone_empresa = '4333998866',
        endereco_empresa = 'Rodovia Teste Nº1000'
where id_empresa = 7;

update tb_empresa
	set nome_empresa = 'Ford',
		telefone_empresa = '43998765544',
        endereco_empresa = 'Rodovia das antas Nº 2000'
where id_empresa = 9;