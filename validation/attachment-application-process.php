<?php

require_once ("../controller/studentsession.php");
require_once ("../controller/class.user.php");
require_once ('../PhpMailer/autoload.php');
$user = new USER();
$user_id = $_SESSION['student_session'];

$stmt = $user->runQuery("SELECT user_email FROM students WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$studentRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($studentRow as $Row){

    $studentRow= $Row['user_email'];
}

if (!empty($_POST)) {

    $unames = strip_tags($_POST['unames']);
    $letter = strip_tags($_POST['letter']);
    $email = $_POST['email'];

    if ($unames==""){

        $result = array();
        $result['msg'] = "Input Your Full Names!";
        $result['status'] = false;
        $result['url'] = 'send-application.php';

        getJsonResponse($result);
    }
    elseif ($letter==""){

        $result = array();
        $result['msg'] = "Input cover letter!";
        $result['status'] = false;
        $result['url'] = 'send-application.php';

        getJsonResponse($result);
    }elseif (isset($_FILES['cv']['name'])) {
        $cv =stripslashes($_FILES['cv']['name']);
        $extension = $user->getExtension($cv);
        $extension = strtolower($extension);

        //validate file
        if (($extension != "doc") && ($extension != "docx") && ($extension != "txt") && ($extension != "pdf")) {
            $result['status'] = false;
            $result['msg'] = "Invalid file format, Only doc, docx, txt & pdf files Allowed";
            $result['url'] = "send-application.php";

            getJsonResponse($result);
            return;
        } else {
            $size = $_FILES["cv"]["size"];
            if ($size > 500000) {
                $result['status'] = false;
                $result['msg'] = "CV file too large";
                $result['url'] = 'send-application.php';

                getJsonResponse($result);
                return;
            }
            try{
//                generate random uniques tokens/numbers
                $cv = md5(uniqid(rand(), true)) . '.' . $extension;
                $newName = "../uploads/" . $cv;
                $copied = move_uploaded_file($_FILES['cv']['tmp_name'], $newName);
                if (!$copied) {
                    $errors = $errors + 1;
                    $result["status"] = false;
                    $result["msg"] = "Something is wrong..please try again!";
                    $result["url"] = "send-application.php";

                    getJsonResponse($result);
                    return;
                }

                $user->uploadApplication($user_id, $unames, $letter, $cv);
//
                $result=array();
                $result['msg']="Successfully Sent!";
                $result['status']=true;
                $result['url']='send-application.php';


                $mail=new PHPMailer();
                $result=array();
                //debugging
                $mail->Debugoutput="error_log";
                $mail->SMTPDebug=2;
                $mail->isSMTP();

//                $mail->Host='smtp.gmail.com';
                $mail->Host='mail.smarthomedecoration.com';
                $mail->SMTPAuth=TRUE;
//                $mail->Username="espiramarvin@gmail.com";
//                $mail->Password="issaplanbunyore3ever";
                $mail->Username="qia@smarthomedecoration.com";
                $mail->Password="9m9SPqSJafmEhSX";
                $mail->Port=587;
                $mail->SMTPSecure="tls";


                //from address
                $mail->setFrom('qia@smarthomedecoration.com', 'TU-K-Technical University of Kenya');
//                $mail->setFrom('espiramarvin@gmail.com', 'TU-K-Technical University of Kenya');
                $mail->addAddress($email);
                $mail->addReplyTo($studentRow);

                //to address
                $mail->addAddress($email);

                $mail->isHTML(TRUE);

                //subject and body
                $mail->Subject = "Application of Attachment";
                $mail->Body = "<h4 style='color: black'>Hi, I'm  <b>".$unames."</b></h4>
                <h4 style='color: black'>Cover Letter</h4>
                <div><p style='word-wrap: normal;color: black'>".$letter."</p></></div>
                <br><p style='color: black'>Below is an attachment of my <b>CV</b>. <br></p>  ";
                $mail->AltBody = "apply apply";

//                attachment
                $mail->addAttachment($newName);
//                unlink('$newName');

                //send mail and return
                $sentIt=$mail->Send();
                if ($sentIt) {

                $result=array();
                $result['msg']="Successfully Sent!";
                $result['status']=true;
                $result['url']='send-application.php';

                    getJsonResponse($result);
                    return TRUE;
                } else {

//                    die($mail->ErrorInfo);
                    return $mail->ErrorInfo;
                }

                getJsonResponse($result);

            }catch (PDOException $e){

                echo $e->getMessage();
            }

        }
    } else {

        $result["status"] = false;
        $result["msg"] = "Please upload your CV";
        $result["url"] = "send-application.php";

        getJsonResponse($result);
        return;
    }
}

function getJsonResponse($result){
    die(json_encode($result));
}
function dd($var){
    var_dump($var);
    die();
}

//cover letter sample
//I'm a computer science enthusiastic and I love to play with numbers, I'm writing this to express my desires to improve my skills and learn more from your remarkable organization through attachment.
//I'm passionate, a good listener and a fast learner, I believe in the notion of leaving a place better than I found it, that is if you will consider me. I'm looking forward to your reply. Thank You.
//Yours Sincerely
//Marvin Espira