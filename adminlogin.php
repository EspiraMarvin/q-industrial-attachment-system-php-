<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator Login | Q~IA</title>
	<meta charset="utf-8">
	<meta name="Description" content="Administrator login" />
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-32x32.png">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">

</head>

<body style="background-color: grey">

<!-- header -->
<header>
	<div class="container">
		<div class="header d-lg-flex justify-content-between align-items-center">
			<div class="header-agile">
				<h1>
                    <a style="color: white; font-size: 0.6em" class="navbar-brand logo" href="index.php">
                        <img class="responsive" src="favicon/favicon-32x32.png" alt=""/> Q~IA
                    </a>
				</h1>
			</div>
			<div class="nav_w3ls">
			<nav>
					<label for="drop" class="toggle mt-lg-0 mt-2"><span class="fa fa-bars" aria-hidden="true"></span></label>
					<input type="checkbox" id="drop" />
						<ul class="menu">
							<li class="mr-lg-3 mr-2 "><a href="index.php">Home</a></li>
							<li class="mr-lg-3 mr-2 p-0">
                            <!-- First Tier Drop Down -->
                            <label for="drop-2" class="toggle">Accounts <span class="fa fa-angle-down" aria-hidden="true"></span></label>
							<a href="#">Accounts <span class="fa fa-angle-down" aria-hidden="true"></span></a>
							<input type="checkbox" id="drop-2"/>
							<ul class="inner-dropdown">
								<li><a href="index.php#student">Students</a></li>
								<li><a href="index.php#org">Organizations</a></li>
							</ul>
							</li>
							<li class="mr-lg-3 mr-2"><a href="guide.php">Attachment Guide</a></li>
						</ul>
				</nav>
			</div>
			<div class="buttons mt-lg-0 mt-2">
				<a href="adminlogin.php">Administrator</a>
			</div>

		</div>
	</div>
</header>
<!-- //header -->

<!-- inner banner -->
<div class="inner-banner" id="home">
	<div class="container">
	</div>
</div>
<!-- //inner banner -->

<!-- page details -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Administrator</li>
	</ol>
</div>
<!-- //page details -->

<!-- gallery -->

<section style="margin-left:8px;margin-right: 8px;" class="banner_bottom" id="">
    <div class="container py-lg-3">

                         <!-- register form grid -->
                <h3 class="col-lg-10 mb-3 text-center">Admin Login</h3>
                <form id="adminlogin-frm" action="validation/login-process.php" method="post" class="register-wthree">
                    <div class="form-group">
                        <div class="mt-3">
                            <div class="col-md-10">
                                <input class="form-control" type="email" placeholder="Enter Email" name="umail" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mt-3">
                            <div class="col-md-10">
                                <input class="form-control" type="password" placeholder="Enter Password" name="upass" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mt-3 mb-3">
                            <div class="col-md-10">
                                <button name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Login</button>
                            </div>
                        </div>
                    </div>
                    <!--display the response returned after form submit-->
                    <div class="text-center col-md-10 status"></div>

                </form>
                <!--  //register form grid ends here -->
            </div>
</section>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="validation/js/jquery.validationEngine.js"></script>
<script src="validation/js/languages/jquery.ValidationEngine.en.js"></script>
<script src="validation/jquery.form.js"></script>
<script src="validation/js/common.js"></script>
<script src="validation/js/login.js"></script>

</body>
</html>