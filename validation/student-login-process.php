<?php
session_start();

require_once ("../controller/class.user.php");
$user = new USER();

if (!empty($_POST)){

    $admno = strip_tags($_POST['admno']);
    $upass = strip_tags($_POST['upass']);


    if ($user->studentLogin($admno,$upass)){

        $result=array();
        $result['msg']="Successful!";
        $result['status']=true;
        $result['url']='profile.php';

        getJsonResponse($result);
    }else{

        $result=array();
        $result['msg']="Wrong Details!";
        $result['status']=false;
        $result['url']='index.php';

        getJsonResponse($result);
    }
}
function getJsonResponse($result){
    die(json_encode($result));
}
function dd($var){
    var_dump($var);
    die();
}
