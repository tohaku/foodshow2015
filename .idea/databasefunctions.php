<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/12/2015
 * Time: 12:27 PM
 */

require_once("/inc/config.php");

function registerSchool($schoolName,$FName,$LName,$email,$phone){
    $dbconn = mysqli_connect($dbhost, $dbuser, $dbpass);
        $sql = 'INSERT INTO registeredSchools'.
            '(schoolName,FName,LName,phoneNumber,email)'.
            'VALUES($schoolName,$FName,$LName,$email,$phone)';
    mysqli_close($dbconn);
}

function returnRegisteredSchools(){

}