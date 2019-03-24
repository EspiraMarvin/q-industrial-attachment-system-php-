<?php

require_once ("../controller/class.user.php");
$user = new USER();

if(!empty($_POST)) {

    $oname = strip_tags($_POST['oname']);
    $omail = strip_tags($_POST['omail']);
    $location = strip_tags($_POST['location']);
    $upass = strip_tags($_POST['upass']);


    if ($oname==""){

        $result=array();
        $result['msg']="Enter Organization Name!";
        $result['status']=false;
        $result['url']='index.php';

        getJsonResponse($result);

    }elseif($omail==""){

        $result=array();
        $result['msg']="Enter Organization Email!";
        $result['status']=false;
        $result['url']='index.php';

        getJsonResponse($result);

    }elseif ($location==""){

        $result=array();
        $result['msg']="Enter Organization Location!";
        $result['status']=false;
        $result['url']='index.php';

        getJsonResponse($result);

    }elseif($upass==""){

        $result=array();
        $result['msg']="Enter Password!";
        $result['status']=false;
        $result['url']='index.php';

        getJsonResponse($result);

    }elseif (strlen($upass) < 6){

        $result=array();
        $result['msg']="Password must be atleast 6 characters!";
        $result['status']=false;
        $result['url']='index.php';

        getJsonResponse($result);

    }else{
        try{
//            dd($_POST);
            $stmt = $user->runQuery("SELECT org_email,org_name from organizations WHERE org_email=:omail AND org_name=:oname ");
            $stmt->execute(array(':omail'=>$omail, 'oname'=>$oname));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['org_name']===$oname){

                $result=array();
                $result['msg']="Organization Already Exists!";
                $result['status']=false;
                $result['url']='index.php';

                getJsonResponse($result);

            }elseif($row['org_email']===$omail){

                $result=array();
                $result['msg']="Organization Already Exists!";
                $result['status']=false;
                $result['url']='index.php';

                getJsonResponse($result);

            }else{
                $user->registerOrg($oname,$omail,$location,$upass);

                $result=array();
                $result['msg']="Succesfully. You can Login!";
                $result['status']=true;
                $result['url']='index.php#org-login';

                getJsonResponse($result);

            }
        }catch (PDOException $e){

            echo $e->getMessage();
        }
    }

}
function getJsonResponse($result){
    die(json_encode($result));
}
function dd($var){
    var_dump($var);
    die();
}