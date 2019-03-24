<?php

require_once ("../controller/class.user.php");
$user = new USER();

if(!empty($_POST)){

    $faculty = strip_tags($_POST['faculty']);
    $admno = strip_tags($_POST['admno']);

    if ($faculty==""){

        $result=array();
        $result['msg']="Choose a faculty!";
        $result['status']=false;
        $result['url']='admin.php';

        getJsonResponse($result);
    }elseif ($admno==""){

        $result=array();
        $result['msg']="Enter Admission Number!";
        $result['status']=false;
        $result['url']='admin.php';

        getJsonResponse($result);
    }else{

        try{

            $stmt = $user->runQuery("SELECT user_admno FROM verification_table WHERE user_admno=:admno");
            $stmt->execute(array(':admno'=>$admno));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

//            dd($_POST);
            if ($faculty==="choose faculty"){


                $result=array();
                $result['msg']="Choose Faculty!";
                $result['status']=false;
                $result['url']='admin.php';

                getJsonResponse($result);
            }
            elseif ($row['user_admno']===$admno){

                $result=array();
                $result['msg']="Student Already Exists!";
                $result['status']=false;
                $result['url']='admin.php';

                getJsonResponse($result);
            }
            else{

                $user->adminregStudent($faculty,$admno);

                $result=array();
                $result['msg']="Successful!";
                $result['status']=true;
                $result['url']='admin.php';

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
