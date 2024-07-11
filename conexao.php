<?php

// URL de conexão com o MongoDB Atlas
$mongoUrl = "mongodb+srv://joaoz:9agos2010@bot.zm3jgak.mongodb.net/?retryWrites=true&w=majority&appName=bot";
$manager = new MongoDB\Driver\Manager($mongoUrl);

// Definição do nome do banco de dados
$dbName = "adm";

// Definição das coleções
$usuariosCollection = $dbName . ".usuarios";
$adminCollection = $dbName . ".admin";

// Inserção de dados padrão para admin
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['user' => 'joao', 'chave' => md5('9agos2010')]);
$manager->executeBulkWrite($adminCollection, $bulk);

// Consulta de usuários
$query = new MongoDB\Driver\Query([]);
$cursor = $manager->executeQuery($usuariosCollection, $query);

foreach ($cursor as $document) {
    var_dump($document);
}

// Consulta de admin
$query = new MongoDB\Driver\Query([]);
$cursor = $manager->executeQuery($adminCollection, $query);

foreach ($cursor as $document) {
    var_dump($document);
}

?>
