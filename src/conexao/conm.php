<?php
    //Carregar as credenciais do banco de dados
    $hostname = "sql103.epizy.com";
    $database = "epiz_31493722_sysrifa";
    $user = "epiz_31493722";
    $password = "Ksge5RmV1KTY";

    try {
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conexão com o banco de dados '.$database.', foi realizada com sucesso';
    } catch (PDOException $e){
        echo 'Erro: ' .$e->getMessage();
    }
 
