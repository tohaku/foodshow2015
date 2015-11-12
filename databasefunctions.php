<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/12/2015
 * Time: 12:27 PM
 */


function registerSchool($schoolName,$FName,$LName,$email,$phone){
    $dbconn = mysql_connect($dbhost, $dbuser, $dbpass);
        $sql = 'INSERT INTO registeredSchools'.
            '(schoolName,FName,LName,phoneNumber,email)'.
            'VALUES($schoolName,$FName,$LName,$email,$phone)';
    mysql_select_db('foodshow2015');
    $retval = mysql_query($sql, $dbconn);
    mysql_close($dbconn);
    if(!$retval){
        return false;
    }
    else {
        return true;
    }

}

function returnRegisteredSchools(){

}
?>