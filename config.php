<?php

define("BASE_URL", "http://localhost/controle_usuarios/");
$config = [
    'dbname' => 'usuarios',
    'host' => 'localhost',
    'dbuser' => 'root',
    'dbpass' => '',
];

global $db;

try {
    $db = new PDO('mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'], $config['dbuser'], $config['dbpass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    return $erro->getMessage();
}
