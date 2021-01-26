<?php
    $host = 'localhost';
    $db = 'crm';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);
