<?php
require_once ("../controller/orgsession.php");
require_once ("../controller/class.user.php");

$user = new USER();

if(!empty($_POST)) {

    $industry = strip_tags($_POST['industry']);
    $title = ucwords(strip_tags($_POST['title']));
    $c_date = strip_tags($_POST['c_date']);
    $applicants = strip_tags($_POST['applicants']);

    if ($industry==""){

        $result=array();
        $result['msg']="Choose Industry!";
        $result['status']=false;
        $result['url']='org.php';

        getJsonResponse($result);
    }elseif ($title==""){

        $result=array();
        $result['msg']="Choose Attachment Title!";
        $result['status']=false;
        $result['url']='org.php';

        getJsonResponse($result);
    }elseif ($c_date==""){

        $result=array();
        $result['msg']="Insert Date!";
        $result['status']=false;
        $result['url']='org.php';

        getJsonResponse($result);
    }elseif ($applicants==""){

        $result=array();
        $result['msg']="Insert Number of Applicants Needed!";
        $result['status']=false;
        $result['url']='org.php';

        getJsonResponse($result);
    }else{
        try{

            $stmt = $user->runQuery("SELECT att_title from attachments WHERE att_title=:title");
            $stmt->execute(array(':title'=>$title));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if ($industry==="Choose Industry"){

                $result=array();
                $result['msg']="Choose Industry!";
                $result['status']=false;
                $result['url']='org.php';

                getJsonResponse($result);

            }
//            elseif($row['att_title']===$title){
//
//                $result=array();
//                $result['msg']="Title Already Inserted!";
//                $result['status']=false;
//                $result['url']='org.php';
//
//                getJsonResponse($result);
//            }
            else{

                $user->postAttach($_SESSION['org_session'],$industry,$title,$c_date,$applicants);

                $result=array();
                $result['msg']="Successful!";
                $result['status']=true;
                $result['url']='org.php';

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
