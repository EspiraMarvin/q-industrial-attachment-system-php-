<?php
//require_once ("../controller/adminsession.php");
require_once ("../controller/class.user.php");
$user = new USER();

//$domain = "//localhost/qia/";

if(!empty($_POST)){
    //dd($_POST);
    $umail = strip_tags($_POST['umail']);
    $upass = strip_tags($_POST['upass']);

    if($umail==""){

        $result=array();
        $result['msg']="Fill in the email!";
        $result['status']=false;
        $result['url']=$user->domain.'adminregister.php';

        getJsonResponse($result);
    }
    elseif($upass=="")
    {
        $result=array();
        $result['msg']="Fill in password!";
        $result['status']=false;
        $result['url']=$user->domain.'adminregister.php';

        getJsonResponse($result);
    }
    elseif (strlen($upass) < 6){

        $result=array();
        $result['msg']="Password must be atleast 6 characters!";
        $result['status']=false;
        $result['url']=$user->domain.'adminregister.php';

        getJsonResponse($result);
    }
    else{
        try
        {

            $stmt = $user->runQuery("SELECT user_email FROM admin WHERE user_email=:umail");
            $stmt->execute(array(':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['user_email']===$umail){

                $result=array();
                $result['msg']="Sorry Email Already Exists!";
                $result['status']=false;
                $result['url']=$user->domain.'adminregister.php';

                getJsonResponse($result);
            }else {
                $user->adminRegister($umail,$upass);

                $result=array();
                $result['msg']="Successfully Registered";
                $result['status']=true;
                $result['url']=$user->domain.'adminlogin.php';

                getJsonResponse($result);

                }

        }catch (PDOException $e){

            echo $e->getMessage();

        }
    }
}
/*else{
    dd($_POST);
    header("Location:https://instagram.com");
}*/

function getJsonResponse($result){
    die(json_encode($result));
}
function dd($var){
    var_dump($var);
    die();
}














