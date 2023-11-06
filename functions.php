<?php

function connectToDb()
{
    return new PDO(
        'mysql:host=127.0.0.1;dbname=form',
        'root',
        ''
    );
}

function selectAll(PDO $pdo, string $table, string $class)
{
    $statement = $pdo->prepare('select * from ' . $table);

    $statement->execute();

    return $statement->fetchAll(
        PDO::FETCH_CLASS,
        $class
    );
}
