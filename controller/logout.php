<?php

require_once ('studentsession.php');
require_once('adminsession.php');
require_once ('orgsession.php');
$user_logout = new USER();

function dd($var){
    var_dump($var);
    die();
}

if(isset($_GET['admin-logout']) && $_GET['admin-logout'] == "true")
{
  //  dd($_POST);
    $user_logout->adminLogout();
    $user_logout->redirect('../adminlogin.php');
}

if (isset($_GET['student-logout']) && $_GET['student-logout'] == "true")
{
    $user_logout->studentLogout();
    $user_logout->redirect('../index.php');
}

if (isset($_GET['org-logout']) && $_GET['org-logout'] == "true")
{
    $user_logout->orgLogout();
    $user_logout->redirect('../index.php');
}
