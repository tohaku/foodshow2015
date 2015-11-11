<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/10/2015
 * Time: 4:44 PM
 */
<?php

try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME .";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
} catch (Exception $e) {
    echo "Could not connect to the database.";
    exit;
}