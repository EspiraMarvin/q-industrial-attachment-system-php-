<?php
require_once(__DIR__.'/../model/dbconfig.php');
class USER{
    private $conn;
    public  $domain;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
        $this->domain="//localhost/qia/";
    }

    //run query
    public function runQuery($sql)
    {
//        $this->dd($_POST);
    $stmt = $this->conn->prepare($sql);
    return $stmt;
    }

    //register admin
    public function adminRegister($umail,$upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("INSERT INTO admin(user_email,user_pass)
                                            VALUES(:umail, :upass)");

            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;
    }

    // admin login
    public function adminLogin($umail,$upass)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT user_id, user_email, user_pass FROM admin WHERE user_email=:umail");
            $stmt->execute(array(':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
//                dd(password_verify($upass, $userRow['user_pass']));
                if(password_verify($upass, $userRow['user_pass']))
                {
//                    dd($userRow);
                    $_SESSION['admin_session'] = $userRow['user_id'];

                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;
    }

    //admin session
    public function is_adminloggedin()
    {
        if(isset($_SESSION['admin_session']))
        {
            return true;
        }
        return false;
    }

    //admin logout
    public function adminLogout()
    {
        session_destroy();
        unset($_SESSION['admin_session']);
        return true;
    }

    //register students by the admin to verification_table for verification of students bfr their acc creation
    public function adminregStudent($faculty,$admno)
    {
        try
        {

            $stmt = $this->conn->prepare("INSERT INTO verification_table(user_faculty,user_admno)
                                          VALUES(:faculty,:admno)");

            $stmt->bindparam(":faculty", $faculty);
            $stmt->bindparam("admno", $admno);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;
    }

    //eligible student registration for personal accounts/profiles
    //should check with the verification_tablet table before successfully creating their acc

    public function registerStudent($admno,$umail,$course,$upass)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT user_id, user_faculty, user_admno FROM verification_table WHERE user_admno=:admno");
            $stmt->execute(array(':admno'=>$admno));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() > 0 && $userRow['user_admno']===$admno) {

                $new_password = password_hash($upass, PASSWORD_DEFAULT);

                $stmt = $this->conn->prepare("INSERT INTO students(user_admno,user_email,user_course,user_pass)
                                            VALUES(:admno, :umail, :course, :upass)");

                $stmt->bindparam(":admno", $admno);
                $stmt->bindparam(":umail", $umail);
                $stmt->bindparam(":course", $course);
                $stmt->bindparam(":upass", $new_password);

                $stmt->execute();

                return $stmt;
            }else{

                $result=array();
                $result['msg']="Sorry you're Not Eligible for an Account!";
                $result['status']=false;
                $result['url']='index.php';

                getJsonResponse($result);
            }

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;
    }

    //student login
    public function studentLogin($admno,$upass)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT user_id, user_admno, user_pass FROM students WHERE user_admno=:admno");
            $stmt->execute(array(':admno'=>$admno));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0 )
            {
                if(password_verify($upass, $userRow['user_pass']))
                {
                    $_SESSION['student_session'] = $userRow['user_id'];

                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;
    }

    //student session
    public function is_studentloggedin()
    {
        if(isset($_SESSION['student_session']))
        {
            return true;
        }
        return false;
    }

    //student logout
    public function studentLogout()
    {
        session_destroy();
        unset($_SESSION['student_session']);
        return true;
    }

    //organization registration
    public function registerOrg($oname,$omail,$location,$upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("INSERT INTO organizations(org_name,org_email,org_location,org_pass)
                                            VALUES(:oname, :omail, :location, :upass)");

            $stmt->bindparam(":oname", $oname);
            $stmt->bindparam(":omail", $omail);
            $stmt->bindparam(":location", $location);
            $stmt->bindparam(":upass", $new_password);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;
    }

    //organization login
    public function orgLogin($omail,$upass)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT org_id, org_name, org_email, org_location, org_pass FROM organizations WHERE org_email=:omail");
            $stmt->execute(array('omail'=>$omail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
                if(password_verify($upass, $userRow['org_pass']))
                {
                    $_SESSION['org_session'] = $userRow['org_id'];

                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;
    }

    //org session
    public function is_orgloggedin()
    {
        if(isset($_SESSION['org_session']))
        {
            return true;
        }
        return false;
    }

    //org logout
    public function orgLogout()
    {
        session_destroy();
        unset($_SESSION['org_session']);
        return true;
    }

    //org post attachment
    public function postAttach($org_id,$industry,$title,$c_date,$applicants){

        try
        {
//            dd($_POST);
            $stmt = $this->conn->prepare("INSERT INTO attachments(org_id,att_industry,att_title,c_date,applicants_needed)
                                            VALUES(:org_id, :industry, :title, :c_date, :applicants)");

            $stmt->bindParam(":org_id", $org_id);
            $stmt->bindparam(":industry", $industry);
            $stmt->bindparam(":title", $title);
            $stmt->bindparam(":c_date", $c_date);
            $stmt->bindparam(":applicants", $applicants);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;
    }

    //checkbox to show you;ve been placed
    public function showAttached($user_id,$attached){

        try
        {
//            dd($_POST);
            $stmt = $this->conn->prepare("INSERT INTO attached(user_id,status)
                                            VALUES(:user_id, :attached)");

            $stmt->bindParam(":user_id", $user_id);
            $stmt->bindParam(":attached", $attached);


            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;
    }
    //file upload + submit application via email
    public function uploadApplication($user_id,$unames,$letter,$cv){

        try
        {

            $stmt = $this->conn->prepare("INSERT INTO applications(user_id,user_name,cover_letter,cv_url) 
		                                               VALUES(:user_id,:unames, :letter, :cv)");

            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":unames", $unames);
            $stmt->bindparam(":letter", $letter);
            $stmt->bindparam(":cv", $cv);


            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return false;


    }
    //    function to get file extension
    public function getExtension($str){
        $i = strrpos($str, ".");
        if(!$i)return "";
        $length = strlen($str) - $i;
        $ext = substr($str, $i+1, $length);

        return $ext;
    }

    //redirect url function
    public function redirect($url)
    {
        header("location: $url");
    }
//    get json response
    function getJsonResponse($result){
        die(json_encode($result));
    }
//    debug function
    function dd($var){
            var_dump($var);
            die();
        }

// function to send email

}
