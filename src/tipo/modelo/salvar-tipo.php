<?php

    //obter a nossa conexão com o banco de dados
    include('../../conexao/conm.php');

    //Obter os dados obtidos do formulário via request
    $requestData = $_REQUEST;

    //Verificação de campos obrigatórios do formulário
    if(empty($requestData['NOME'])){
            //Caso a variavel venha vazia do formulário, retornar um erro
    $dados = array(
        "tipo" => 'error',
        "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s)!'
    );
      } else {
          //Caso os campos orbigatórios estejam preenchidos, iremos realizar o cadastro
          $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
          $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

          //Verificação para cadastro ou atualização de registro
          if($operacao = 'insert') {
              //Comandos para o INSERT no banco de dados ocorrerem
              try{
                  $stmt = $pdo->('INSERT INTO TIPO (NOME) VALUES (:a)');
                  $stmt->execute(array(
                    ':a' => utf8_decode($requestData['NOME'])
                  ));
                  $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Registro salvo com sucesso.'
                );
              } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível salvar o registro: '.$e
                );
              }
          } else {
              //Se a nossa operação vir vazia, então iremos realizar um update no banco de dados
              try{
                $stmt = $pdo->('UPDATE TIPO SER NOME = :a WHERE ID= :id');
                $stmt->execute(array(
                  ':id' => $ID,
                  ':a' => utf8_decode($requestData['NOME'])
                ));
                $dados = array(
                  "tipo" => 'success',
                  "mensagem" => 'Registro atualizado com sucesso.'
              );
            } catch(PDOException $e) {
              $dados = array(
                  "tipo" => 'error',
                  "mensagem" => 'Não foi possível atualizar o registro: '.$e
              );
            }
          }
    }

    //Converter o nosso array de retorno em uma representação JSON
    echo json_encode($dados);