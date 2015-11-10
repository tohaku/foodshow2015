<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/9/2015
 * Time: 1:10 PM
 * Creates the SQLite DBs needed for food show
 * Moving to MySQL, possible bad PHP config for NoSQL, MySQl is already setup on server
 */

    try {
        //creating / opening database
        $db = new PDO('sqlite:foodshow.sqlite3');
        $db -> $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //creating registered schools table in database
        $db -> exec("CREATE TABLE IF NOT EXISTS registeredSchools (
                    id INTEGER PRIMARY KEY,
                    FName TEXT,
                    LName TEXT,
                    SchoolName TEXT,
                    PhoneNum  TEXT,
                    Email TEXT)");
        echo "Database and tables created successfully";
    }
    catch(PDOException $e) {
        //spit out error message if exist
        echo $e->getMessage();
    }
/*
    if($db = sqlite_open('foodshow', $sqliteerror)){
        echo "Database created / opened successfully, adding tables";
    }
    else {
        die($sqliteerror);
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
*/