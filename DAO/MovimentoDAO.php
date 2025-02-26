<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class MovimentoDAO extends Conexao{

    public function RealizarMovimento($tipo, $data, $valor, $obs, $categoria, $empresa, $conta){
        if ($tipo == '' || $data == '' || $valor == '' || $categoria == '' || $empresa == '' || $conta == '') {
            return 0;
        } else {
            // return 1;

            $conexao = parent::retornarConexao();

            $comando_sql = 'INSERT INTO tb_movimento(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?)';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $i = 1;

            $sql->bindValue(1, $tipo);
            $sql->bindValue(2, $data);
            $sql->bindValue(3, $valor);
            $sql->bindValue(4, $obs);
            $sql->bindValue(5, $categoria);
            $sql->bindValue(6, $empresa);
            $sql->bindValue(7, $conta);
            $sql->bindValue(8, UtilDAO::UsuarioLogado());

            // Função nativa do PHP para monitorar e manter a segurança dos dados e da ação executada!
            $conexao->beginTransaction();

            try {
                // Inserção na tb_movimento
                $sql->execute();

                if ($tipo == 1) {
                    $comando_sql = 'UPDATE tb_conta SET saldo_conta = saldo_conta + ? WHERE id_conta = ?;';
                } else if ($tipo == 2) {
                    $comando_sql = 'UPDATE tb_conta SET saldo_conta = saldo_conta - ? WHERE id_conta = ?;';
                }

                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1, $valor);
                $sql->bindValue(2, $conta);

                $sql->execute();

                // Essa linha de comando valida e executa a ação na Tabela do Banco de Dados!
                $conexao->commit();

                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();

                // Caso algum problema aconteça, todo o processo será cancelado e a integridade dos dados mantida!
                $conexao->rollBack();
                return -1;
            }
        }
    }

    public function ConsultarMovimento($tipoMov, $data_inicial, $data_final) {
        if ($tipoMov == '' || $data_inicial == '' || $data_final == '') {
            return 0;
        } else {
            // return 1;

            $conexao = parent::retornarConexao();

            $comando_sql = 'SELECT id_movimento,
                                        tb_movimento.id_conta,
                                        tipo_movimento, 
                                        DATE_FORMAT(data_movimento, "%d/%m/%Y") AS data_movimento,
                                        valor_movimento, 
                                        nome_categoria, 
                                        nome_empresa, 
                                        banco_conta, 
                                        numero_conta, 
                                        agencia_conta, 
                                        saldo_conta,
                                        obs_movimento FROM tb_movimento
                                    INNER JOIN tb_categoria
                                        ON tb_categoria.id_categoria = tb_movimento.id_categoria
                                    INNER JOIN tb_empresa
                                        ON tb_empresa.id_empresa = tb_movimento.id_empresa
                                    INNER JOIN tb_conta
                                        ON tb_conta.id_conta = tb_movimento.id_conta
                                    WHERE tb_movimento.id_usuario = ? AND tb_movimento.data_movimento BETWEEN ? AND ?';
            if($tipoMov != 0){
                $comando_sql= $comando_sql . 'AND tipo_movimento = ?';
                // $comando_sql .= ' AND tipo_movimento = ?';
            }

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, UtilDAO::UsuarioLogado());
            $sql->bindValue(2, $data_inicial);
            $sql->bindValue(3, $data_final);

            if($tipoMov != 0){
                $sql->bindValue(4, $tipoMov);
            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();

        }
    }

    public function ExcluirMovimento($idMov, $idConta, $tipo, $valor){
        if($idMov == '' || $idConta == '' || $tipo == '' || $valor == ''){
            return 0;
        }else{
            $conexao = parent::retornarConexao();

            $comando_sql = 'DELETE FROM tb_movimento WHERE id_movimento = ?;';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $idMov);

            $conexao->beginTransaction();

            try{
                $sql->execute();

                if($tipo == 1){
                    $comando_sql = 'UPDATE tb_conta SET saldo_conta = saldo_conta - ? WHERE id_conta = ?;';
                }else if($tipo == 2){
                    $comando_sql = 'UPDATE tb_conta SET saldo_conta = saldo_conta + ? WHERE id_conta = ?;';
                }

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $valor);
                $sql->bindValue(2, $idConta);

                $sql->execute();

                $conexao->commit();

                return 1;
            }catch(Exception $ex){
                echo $ex->getMessage();

                $conexao->rollBack();

                return -1;
            }
        }
    }
}
