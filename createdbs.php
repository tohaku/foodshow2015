<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/9/2015
 * Time: 1:10 PM
 * Creates the SQLite DBs needed for food show
 */

    class MyDB extends SQLite3 {
        function __construct(){
            $this->open('foodshow.db');
            echo("Database created \n");
        }
    }
    $db = new MyDB();

    if(!$db){
        echo $db->lastErrorMsg();
        exit; //if can't open DB, exit PHP
    }
    else {
        echo "Database opened successfully\n";
    }

    $sql =<<< EOF
        CREATE TABLE registeredSchools(
        ID INT PRIMARY KEY NOT NULL,
        FName   TEXT    NOT NULL,
        LName   TEXT    NOT NULL,
        schoolName  CHAR(50)   NOT NULL,
        phoneNumber CHAR(50)    NOT NULL);
EOF;

    $ret = $db->exec($sql);
    if(!$ret){
        echo $db->lastErrorMsg();
    }
    else {
        echo "Registered schools table created successfully";
    }
    $db->close();
