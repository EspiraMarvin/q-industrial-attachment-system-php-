<?php
require_once ("controller/studentsession.php");
require_once("controller/class.user.php");
$user = new USER();

if (!empty($_GET) && isset($_GET['fff'])){

    $org_id=$_GET['fff'];
}else{
//    dd($_GET);
    $user->redirect('profile.php');
}

$stmt = $user->runQuery("SELECT org_email FROM organizations WHERE org_id=:org_id");
$stmt->execute(array(":org_id"=>$org_id));
$orgRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($orgRow as $Row){

    $email= $Row['org_email'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Apply | Q~IA</title>
    <meta charset="utf-8">
    <meta name="Description" content="">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" />
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

</head>

<body style="background-color: grey">

<!-- header -->
<header style="background-color: grey; margin-top: -120px">
    <div class="container">
        <div class="header d-lg-flex justify-content-between align-items-center">
            <div class="header-agile">
                <h1>
                    <a style="color: white" class="navbar-brand logo mt-2">
                        <img class="responsive" src="favicon/favicon-32x32.png" alt=""/> Q~IA
                    </a>
                </h1>
            </div>
            <div class="buttons mt-lg-0 mt-2">
                <a href="profile.php">Profile</a>
            </div>
        </div>
    </div>

</header>
<!-- //header -->

<section  style="margin-top: 120px; background-color: whitesmoke" class="">

        <div style="margin-top:" class="col-lg-12 mt-lg-0">
            <h3 class="col-lg-10">Apply for this attachment</h3>
            <form id="apply-attachment-frm" action="validation/attachment-application-process.php" method="post" enctype="multipart/form-data" class="offset-lg-1 register-wthree ">
                <div class="form-group">
                    <div class="mt-3">
                        <div class="col-md-10">
                            <input class="form-control" type="text" placeholder="Enter Full Names" name="unames" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mt-3">
                        <div class="col-md-10">
                            <label class="ml-2" for="exampleFormControlTextarea1">Cover Letter</label>
                            <textarea class="form-control" name="letter" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mt-3">
                        <div class="col-md-10">
                            <label class="ml-2 mb-2" for="exampleFormControlFile1">Attach your CV</label>
                            <input type="file" name="cv" class="form-control-file ml-2" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mt-3">
                        <div class="col-md-10">
                            <button name="apply" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">APPLY</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="email" value="<?php echo $email ?>">
                <!--display the response returned after form submit-->
                <div class="text-center mb-5 col-md-10 apply-attach-status"></div>
            </form>
    </div>
</section>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="validation/js/jquery.validationEngine.js"></script>
<script src="validation/js/languages/jquery.ValidationEngine.en.js"></script>
<script src="validation/jquery.form.js"></script>
<script src="validation/js/common.js"></script>
<script src="validation/js/register.js"></script>
</html>

