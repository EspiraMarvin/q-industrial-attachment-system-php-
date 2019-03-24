<?php

require_once ("../controller/class.user.php");
$user = new USER();

if(!empty($_POST)){

    $admno = strip_tags($_POST['admno']);
    $umail = strip_tags($_POST['umail']);
    $course = strip_tags($_POST['course']);
    $upass = strip_tags($_POST['upass']);

    if ($admno==""){

        $result=array();
        $result['msg']="Fill in Admission Number!";
        $result['status']=false;
        $result['url']='index.php';

        getJsonResponse($result);

    }elseif ($umail==""){

        $result=array();
        $result['msg']="Fill in Email!";
        $result['status']=false;
        $result['url']='index.php';

        getJsonResponse($result);

    }elseif ($course==""){

        $result=array();
        $result['msg']="Fill in Course!";
        $result['status']=false;
        $result['url']='index.php';

        getJsonResponse($result);

    }elseif ($upass==""){

        $result=array();
        $result['msg']="Fill in Password!";
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
            $stmt = $user->runQuery("SELECT user_admno FROM students WHERE user_admno=:admno");
            $stmt->execute(array(':admno'=>$admno));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['user_admno']===$admno){

                $result=array();
                $result['msg']="Sorry User Already Exists!";
                $result['status']=false;
                $result['url']='index.php';

                getJsonResponse($result);

            }elseif($row['user_admno']!=$admno){

                $user->registerStudent($admno,$umail,$course,$upass);

                $result=array();
                $result['msg']="Registered. You can Login!";
                $result['status']=true;
                $result['url']='index.php#student-login';

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
