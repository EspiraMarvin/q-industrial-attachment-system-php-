<?php
//dd($_POST);
require_once ("controller/adminsession.php");
require_once("controller/class.user.php");
$user = new USER();

$user_id = $_SESSION['admin_session'];

$stmt = $user->runQuery("SELECT * FROM admin WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT count(*) as total_students FROM students");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_students = $row['total_students'];

$stmt = $user->runQuery("SELECT count(*) as total_students_verify FROM verification_table");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_students_verify = $row['total_students_verify'];

$stmt = $user->runQuery("SELECT count(*) as total_orgs FROM organizations");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_orgs = $row['total_orgs'];

$stmt = $user->runQuery("SELECT count(*) as total_attached FROM attached");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_attached = $row['total_attached'];

$stmt = $user->runQuery("SELECT count(*) as total_attachments FROM attachments");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_attachments = $row['total_attachments'];

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

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE attachments.att_industry='Health'");
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

$stmt = $user->runQuery("SELECT * FROM students INNER JOIN attached ON students.user_id=attached.user_id");
$stmt->execute();
$statusRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

//$stmt = $user->runQuery("SELECT organizations.org_name, attachments.applicants_needed FROM organizations INNER JOIN attachments ON organizations.org_id=attachments.org_id");
//$stmt->execute();
//$orgattachmentRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrator | Q~IA</title>
    <meta charset="utf-8">
    <meta name="Description" content="Administrator workspace">
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
    <div class="container">
        <div class="header d-lg-flex justify-content-between align-items-center">
            <div class="header-agile">
                <h1>
                    <a style="color: white" class="navbar-brand logo mt-2">
                        <img class="responsive" src="favicon/favicon-32x32.png" alt=""/> Q~IA
                    </a>
                </h1>
            </div>
            <div class="col-5">
                <label style="color: white" class="text-center mt-3">Welcome : <?php print strtoupper($userRow['user_email']); ?></label>
            </div>
            <div class="buttons mt-lg-0 mt-2">
                <a href="controller/logout.php?admin-logout=true">LOGOUT</a>
            </div>

        </div>
    </div>

</header>
<!-- //header -->

<section class="jumbotron">

    <div style=" margin-top: 120px">
        <ul class="nav nav-pills nav-justified">
            <li role="presentation" style="font-size:18px; width:25%" class="active">
                <a style="margin-left:-17px" href="#registration" data-toggle="tab"><button class="btn-dark button-block active">Register</button></a></li>
            <li role="presentation" style="font-size:18px; width:25%">
                <a style="margin-left: 1px" href="#attachments" data-toggle="tab"><button class="btn-dark button-block">Attach.s</button></a></li>
            <li role="presentation" style="font-size:18px; width:25%">
                <a style="margin-left: 20px" href="#status" data-toggle="tab"><button class="btn-dark button-block">Status</button></a></li>
            <li role="presentation" style="font-size:18px; width:25%">
            <a style="margin-left: 25px" href="#stats" data-toggle="tab"><button class="btn-dark button-block">Stats</button></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="registration">

                    <div class="col-lg-12 mt-lg-0">
                        <!-- register form grid -->
                        <h4 class="col-lg-10 mt-4">Register Students</h4>
                        <form id="student-verification-frm" action="validation/student-registration-verification.php" method="post" class="register-wthree">
                            <div class="form-group">
                                <div class="mt-3">
                                        <label class="col-md-10">
                                            <select name="faculty" class="custom-select" id="inputGroupSelect01">
                                            <option selected value="choose faculty">Choose Faculty</option>
                                            <option value="Engineering Sciences & Technology">Engineering Sciences & Technology</option>
                                            <option value="Social Sciences & Technology">Social Sciences & Technology</option>
                                            <option value="Applied Sciences & Technology">Applied Sciences & Technology</option>
                                            </select>
                                        </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mt-3">
                                    <div class="col-md-10">
                                        <input class="form-control" id="admno" type="text" placeholder="Enter Admission Number" name="admno" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mt-3 mb-3">
                                    <div class="col-md-10">
                                        <button name="register" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Register</button>
                                    </div>
                                </div>
                            </div>
                            <!--display the response returned after form submit-->
                            <div class="text-center col-md-10 status"></div>

                        </form>
                        <!--  //register form grid ends here -->
                    </div>
            </div>


            <!-- notices div-->
            <div class="tab-pane" id="attachments">
                <div>

                    <h4 class="mt-3">Attachments</h4>
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
                                </div>
                                <div style="border-bottom: double" class="card-footer text-muted">
                                    <?php echo $Row['org_name'] ?>, <?php echo $Row['org_location'] ?>
                                </div>
                            <?php } }
                        ?>
                    </div>

                </div>

            </div>
            <!-- end of attachments div-->
            <!-- status div-->
            <div class="tab-pane" id="status">
<!--                <div class="col-lg-12">-->
                    <h4 class="mt-4">Attached students</h4>
                <form class="">
                    <table style="background-color: white;width: 100%" class="table table-grey text-black text-center mt-5">
                        <thead>
                        <tr>
<!--                            <th style="width: 4%">No.</th>-->
                            <th style="width: 48%" class="">Admission No.</th>
                            <th style="width: 48%" class="">Course</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($statusRow)==0){ ?>
                            <h6 style="text-align: center;margin-top: 10px"><?php echo "No Student Attached"; ?></h6>
                        <?php }else{
                        foreach ($statusRow as $Row) {;?>
                            <tr>
<!--                                <td style="width: 4%;">--><?php //echo ""?><!--</td>-->
                                <td style="width: 48%"><?php echo $Row['user_admno'] ?></td>
                                <td style="width: 48%"><?php echo $Row['user_course']?></td>
                            </tr>
                        <?php } } ?>
                        </tbody>
                    </table>
                </form>
<!--                </div>-->
            </div>
            <!-- end of worker div-->
            <!--stats div-->
            <div class="tab-pane"  style="" id="stats">
                <div class="float-left col-lg-6 jumbotron">
                    <h4 class=" mt-2">Statistics</h4>
                    <h5 class="text-center card text-black col-12 mt-3">
                        Number of Eligible Students (with accounts):  <span class=""><?php echo $total_students; ?></span>
                    </h5>
                    <h5 class="text-center  card text-black col-12 mt-3">
                        Number of Students in Verification Table: <span class=""><?php echo $total_students_verify; ?></span>
                    </h5>
                    <h5 class="text-center  card text-black col-12 mt-3">
                        Number of Organizations: <span class=""><?php echo $total_orgs; ?></span>
                    </h5>
                    <h5 class="text-center  card text-black col-12 mt-3">
                        Number of Students Attached: <span class=""><?php echo $total_attached; ?></span>
                    </h5>
                    <h5 class="text-center  card text-black col-12 mt-3">
                        Total Number of Attachments: <span class=""><?php echo $total_attachments; ?></span>
                    </h5>
                </div>

                 <div class="float-right col-lg-6 jumbotron">
                     <h4 class="mt-2">Organizations</h4>
                      <table style="background-color: white" class="table table-grey text-black text-center col-12 mt-3">
                          <thead>
                            <tr>
                                <th class="text-center">Organizations offering Attachment</th>
<!--                                <th class="text-center">No. of Slots</th>-->
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($orgRow as $Row) {;?>
                             <tr>
                                 <td><?php echo $Row['org_name'] ?></td>
<!--                                 <td>--><?php //echo $Row['applicants_needed']?><!--</td>-->
                             </tr>
                            <?php } ?>
                           </tbody>
                       </table>
                  </div>

            </div><!-- end of row for stats-->
        </div><!-- end of tab-pane stats-->
    </div>
<!-- end of tab content--><!-- end of div for jumbotron-->
</section>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script src="validation/js/jquery.validationEngine.js"></script>
<script src="validation/js/languages/jquery.ValidationEngine.en.js"></script>
<script src="validation/jquery.form.js"></script>
<script src="validation/js/common.js"></script>
<script src="validation/js/register.js"></script>
</html>
