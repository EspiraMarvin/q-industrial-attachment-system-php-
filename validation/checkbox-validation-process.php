<?php
require_once ("../controller/studentsession.php");
require_once ("../controller/class.user.php");
$user = new USER();

$user_id = $_SESSION['student_session'];

if(!empty($_POST)) {

    $attached = strip_tags($_POST['attached']);

    if($attached==""){

        $result=array();
        $result['msg']="Check First!";
        $result['status']=false;
        $result['url']='profile.php';

        getJsonResponse($result);
    }else{
        try{

            $stmt = $user->runQuery("SELECT user_id from attached WHERE user_id=:user_id");
            $stmt->execute(array(':user_id'=>$user_id));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['user_id']===$user_id){

                $result=array();
                $result['msg']="Already Checked!";
                $result['status']=false;
                $result['url']='profile.php';

                getJsonResponse($result);

            }else{

                $user->showAttached($_SESSION['student_session'],$attached);

                $result=array();
                $result['msg']="Successful!";
                $result['status']=true;
                $result['url']='profile.php';

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
