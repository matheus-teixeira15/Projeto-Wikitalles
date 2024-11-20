<?php
   //Define as constantes para conectar com o banco de dados "wikitalles"
   define("DSN", "mysql");
   define("SERVIDOR", "localhost");
   define("USUARIO", "root");
   define("SENHA", null);
   define("BANCODEDADOS", "wikitalles");


   //Função para estabelecer a conexão com o banco de dados via PDO
     function conectaPDO() {
          try {
               $conn = new PDO('mysql:host='.SERVIDOR.';dbname='.BANCODEDADOS, USUARIO, SENHA);
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               return $conn;
          } catch (PDOException $e) {
               echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
               exit;
          }
     }
?>