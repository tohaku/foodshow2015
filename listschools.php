<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/12/2015
 * Time: 1:44 PM
 * List all registered schools in the database
 */
require("inc/config.php");

$dbconn = mysql_connect($dbhost,$dbuser,$dbpass);

if (!dbconn){
    die("Couldn't connect to the database". mysql_error());
}

$sql = "SELECT schoolName, FName, LName, phoneNumber, email";
mysql_select_db(`foodshow2015`);
