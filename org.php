<?php
require_once ("controller/orgsession.php");
require_once("controller/class.user.php");
$user = new USER();

$user_id = $_SESSION['org_session'];

$stmt = $user->runQuery("SELECT * FROM organizations WHERE org_id=:org_id");
$stmt->execute(array(":org_id"=>$user_id));
$orgRow=$stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user->runQuery("SELECT * FROM attachments INNER JOIN organizations ON attachments.org_id=organizations.org_id WHERE organizations.org_id='$user_id'");
$stmt->execute();
$attachmentRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Organization | Q~IA</title>
    <meta charset="utf-8">
    <meta name="Description" content="Organization profile">
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
                <label style="color: white" class="text-center mt-3">Welcome : <?php print strtoupper($orgRow['org_email']); ?></label>
            </div>
            <div class="buttons mt-lg-0 mt-2">
                <a href="controller/logout.php?org-logout=true">LOGOUT</a>
            </div>

        </div>
    </div>

</header>
<!-- //header -->

<section class="jumbotron">

    <div id="row" style="margin-top: 120px">
        <ul class="nav nav-pills nav-justified text-center">
            <li role="presentation" style="font-size:18px" class="active">
                <a style="width: 60%" href="#attachment" data-toggle="tab"><button class="btn-dark button-block active">Post Attachment</button></a></li>
            <li role="presentation" style="font-size:18px; width:33%">
                <a style="margin-left: 4px" href="#posts" data-toggle="tab"><button class="btn-dark button-block">Attachments</button></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="attachment">

                <div class="col-lg-12 mt-lg-0">
                    <!-- register form grid -->
                    <h4 class="col-lg-10 mt-4">Post Attachment Opportunity</h4>
                    <form id="post-attachment-frm" action="validation/post-attachment-process.php" method="post" class="offset-lg-1 register-wthree ">
                        <div class="form-group">
                            <div class="mt-3">
                                <label class="col-md-10">
                                    <select name="industry" class="custom-select" id="inputGroupSelect01">
                                        <option selected value="Choose Industry">Choose Industry</option>
                                        <option value="Agriculture, Fishing & Forestry">Agriculture, Fishing & Forestry</option>
                                        <option value="Art & Design">Art & Design</option>
                                        <option value="Banking, Finance & Insurance">Banking, Finance & Insurance</option>
                                        <option value="Education, Teaching & Training">Education, Teaching & Training</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Hospitality & Hotel">Hospitality & Hotel</option>
                                        <option value="IT & Software">IT & Software</option>
                                        <option value="Law">Law</option>
                                        <option value="Real Estate">Real Estate</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <div class="col-md-10">
                                    <input class="form-control" type="text" placeholder="Enter Attachment Title" name="title" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <div class="col-md-10">Commencement Date
                                    <input type="date" name="c_date" min="2000-01-02" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="applicants" placeholder="No. of Attaches Needed" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <div class="col-md-10">
                                    <button name="register" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                        <!--display the response returned after form submit-->
                        <div class="text-center col-md-10 org-attach-status"></div>
                    </form>
                    <!--  //register form grid ends here -->
                </div>

            </div>

<!--  attachment posted div-->
            <div class="tab-pane" id="posts">
                    <div class="container col-lg-12">
                        <h4 class="mt-4 ml-3">Attachments Posted</h4>
                        <table style="background-color: white" class="table table-grey text-black text-center col-12 mt-3">
                            <thead>
                            <tr>
                                <th class="text-center">Attachment Opportunities Available</th>
                                <!--  <th class="text-center">No. of Slots</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($attachmentRow)==0){ ?>

                                <h6 style="text-align: center"><?php echo "No Attachments Posted"; ?></h6>
                            <?php }else{
                            foreach ($attachmentRow as $Row) { ?>
                                <tr>
                                    <td><?php echo $Row['att_title'] ?></td>
<!--                                  <td>--><?php //echo $Row['applicants_needed']?><!--</td>-->
                                </tr>
                            <?php } }?>
                            </tbody>
                        </table>
                    </div>
            </div>
<!--             end of posts div-->

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

