<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/9/2015
 * Time: 1:10 PM
 * Creates the SQLite DBs needed for food show
 */


    if($db = sqlite_open('foodshow.db', $sqliteerror)){
        echo "Database created / opened successfully, adding tables";
    }
    else {
        die($sqliteerror);
    }
/*
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
*/