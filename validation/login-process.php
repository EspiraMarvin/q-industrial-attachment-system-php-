<?php
session_start();

require_once ("../controller/class.user.php");
$user = new USER();

//$login = new USER();

/*if ($login->is_adminloggedin()!="")
{
 //    dd("Reached here");
    $login->redirect('adminlogin.php');

}*/

if (!empty($_POST)) {

    $umail = strip_tags($_POST['umail']);
    $upass = strip_tags($_POST['upass']);


    if($user->adminLogin($umail,$upass))
    {

        $result=array();
        $result['msg']="Successful!";
        $result['status']=true;
        $result['url']='admin.php';

        getJsonResponse($result);

    }else{

        //dd($_POST);

        $result=array();
        $result['msg']="Wrong Details!";
        $result['status']=false;
        $result['url']='adminlogin.php';

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




