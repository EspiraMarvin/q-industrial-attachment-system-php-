<?php
require_once ("controller/studentsession.php");
require_once("controller/class.user.php");
$user = new USER();

$user_id = $_SESSION['student_session'];

$stmt = $user->runQuery("SELECT * FROM students WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT *  FROM organizations");
$stmt->execute();
$orgRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Engineering'");
$stmt->execute();
$engineeringRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Law'");
$stmt->execute();
$lawRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='IT & Software'");
$stmt->execute();
$itRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Banking, Finance & Insurance'");
$stmt->execute();
$financeRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Education, Teaching & Training'");
$stmt->execute();
$educationRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Healthcare'");
$stmt->execute();
$healthRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Real Estate'");
$stmt->execute();
$estateRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Art & Design'");
$stmt->execute();
$designRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Agriculture, Fishing & Forestry'");
$stmt->execute();
$forestryRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Hospitality & Hotel'");
$stmt->execute();
$hotelRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile | Q~IA</title>
    <meta charset="utf-8">
    <meta name="Description" content="Student's account/profile">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" />
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2 user-scalable=no">

</head>

<body style="background-color: grey">

<!-- header -->
<header style="background-color: grey">
    <div style="width: 100%" class="container">
        <div class="header d-lg-flex justify-content-between align-items-center">
            <div class="header-agile">
                <h1>
                    <a style="color: white; width: " class="navbar-brand logo mt-2">
                        <img class="responsive" src="favicon/favicon-32x32.png" alt=""/> Q~IA
                    </a>
                </h1>
            </div>
            <div class="col-5">
                <label style="color: white" class="mt-3">Welcome: <?php print strtoupper($userRow['user_admno']); ?></label>
            </div>
            <div class="buttons mt-lg-0 mt-2">
                <a href="controller/logout.php?student-logout=true">LOGOUT</a>
            </div>

        </div>
    </div>

</header>
<!-- //header -->

<section class="jumbotron">

    <div id="row" style="width: 100%; margin-top: 120px">
        <ul class="nav nav-pills nav-justified">
            <li role="presentation" style="font-size:18px; width:25%" class="active">
                <a style="margin-left:-12px" href="#apply" data-toggle="tab"><button class="btn-dark button-block active">Apply</button></a></li>
            <li role="presentation" style="font-size:18px; width:25%">
                <a style="margin-left: -15px" href="#organizations" data-toggle="tab"><button class="btn-dark button-block">Organizations</button></a></li>
            <li role="presentation" style="font-size:18px; width:25%">
                <a style="margin-left: 52px" href="#placed" data-toggle="tab"><button class="btn-dark button-block">Attached?</button></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="apply">
                <div>
                    <h4 class="mt-4">Attachments per industry</h4>
                    <div id="row" class="card text-center mt-2 float-lg-left col-sm-6 ">
                        <div class="card-header">
                            <b>Engineering</b>
                        </div>
                        <?php if(count($engineeringRow)==0){ ?>
                            <h6  style="margin-bottom:30px;margin-top:20px" ><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($engineeringRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                               ?>
                    </div>

                    <div id="row" class=" card text-center mt-2 col-sm-6">
                        <div class="card-header">
                            <b>Law</b>
                        </div>
                        <?php if(count($lawRow)==0){ ?>
                            <h6  style="margin-bottom:30px; margin-top:20px" ><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($lawRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>
                </div>

                <div>
                    <h4 class="mt-3">&nbsp;</h4>
                    <div id="row" class="card text-center mt-2 float-left col-sm-6 ">
                        <div style="margin-bottom: 4px" class="card-header">
                            <b>IT & Software</b>
                        </div>
                        <?php if(count($itRow)==0){ ?>
                            <h6  style="margin-bottom:30px;margin-top:20px"><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($itRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>

                    <div id="row" class=" card text-center mt-2 col-sm-6">
                        <div class="card-header">
                            <b>Banking, Finance & Insurance</b>
                        </div>
                        <?php if(count($financeRow)==0){ ?>
                            <h6  style="margin-bottom:30px;margin-top:20px" ><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($financeRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>
                </div>

                <div>
                    <h4 class="mt-3">&nbsp;</h4>
                    <div id="row" class="card text-center mt-2 float-left col-sm-6 ">
                        <div style="margin-bottom: 4px" class="card-header">
                            <b>Education, Teaching & Training</b>
                        </div>
                        <?php if(count($educationRow)==0){ ?>
                            <h6  style="margin-bottom:30px;margin-top:20px"><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($educationRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>

                    <div id="row" class=" card text-center mt-2 col-sm-6">
                        <div class="card-header">
                            <b>Healthcare</b>
                        </div>
                        <?php if(count($healthRow)==0){ ?>
                            <h6  style="margin-bottom:30px;margin-top:20px" ><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($healthRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>
                </div>

                <div>
                    <h4 class="mt-3">&nbsp;</h4>
                    <div id="row" class="card text-center mt-2 float-left col-sm-6 ">
                        <div style="margin-bottom: 4px" class="card-header">
                            <b>Real Estate</b>
                        </div>
                        <?php if(count($estateRow)==0){ ?>
                            <h6  style="margin-bottom:30px;margin-top:20px"><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($estateRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>

                    <div id="row" class=" card text-center mt-2 col-sm-6">
                        <div class="card-header">
                            <b>Art & Design</b>
                        </div>
                        <?php if(count($designRow)==0){ ?>
                            <h6  style="margin-bottom:30px;margin-top:20px" ><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($designRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>
                </div>

                <div>
                    <h4 class="mt-3">&nbsp;</h4>
                    <div id="row" class="card text-center mt-2 float-left col-sm-6 ">
                        <div style="margin-bottom: 4px" class="card-header">
                            <b>Agriculture, Fishing & Forestry</b>
                        </div>
                        <?php if(count($forestryRow)==0){ ?>
                            <h6  style="margin-bottom:30px;margin-top:20px"><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($forestryRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>

                    <div id="row" class=" card text-center mt-2 col-sm-6">
                        <div class="card-header">
                            <b>Hospitality & Hotel</b>
                        </div>
                        <?php if(count($hotelRow)==0){ ?>
                            <h6  style="margin-bottom:30px;margin-top:20px" ><?php echo "No Attachments Available"; ?></h6>
                        <?php }else{
                            foreach($hotelRow as $Row) { ?>
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo $Row['att_title'] ?></h5>
                                    <p class="card-text">Start Date: <?php echo $Row['c_date'] ?> </p>
                                    <p class="card-text">Number of Attaches Needed: <?php echo $Row['applicants_needed'] ?></p>
                                    <a style="width: 100px" href="send-application.php?fff=<?php echo $Row['org_id']?>" class="btn btn-primary">Apply</a>
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>
                </div>

            </div>

            <!-- organizations div-->
            <div class="tab-pane" id="organizations">
                <div class="col-lg-12">
                    <h4 class="mt-4">Organizations</h4>
                    <table style="background-color: white" class="table table-grey text-black text-center col-12 mt-3">
                        <thead>
                        <tr>
                            <th class="text-center">Organizations offering Attachment</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orgRow as $Row) {;?>
                            <tr>
                                <td><?php echo $Row['org_name'] ?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end of organizations div-->
            <!-- placed div-->
            <div class="tab-pane" id="placed">
                <div>
                    <div class="col-lg-12 mt-lg-0">
                        <!-- register form grid -->
                        <h5 style="margin-left:-20px" class="col-lg-10 mt-4 mb-4">Note: Submit Checkbox ONLY after successfully getting an attachment email from an organization.</h5>
                        <form id="show-attached-frm" action="validation/checkbox-validation-process.php" method="post" class="register-wthree">
                            <div class="form-group">
                                <div class="mt-5">
                                    <div class="text-center col-md-10">
                                        <input class="form-check-input" type="checkbox" name="attached" value="Attached" required=""> Attached
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mt-4 mb-3">
                                    <div class="text-center col-md-10">
                                        <button style="margin-left:-10px;width: 100px" name="register" class="btn-primary text-uppercase">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <!--display the response returned after form submit-->
                            <div class="text-center col-md-10 show-attach-status"></div>
                        </form>
                        <!--  //register form grid ends here -->
                    </div>
                </div>
            </div>
            <!-- end of placed div-->
        </div>
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
