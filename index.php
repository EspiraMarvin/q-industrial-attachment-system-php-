<!DOCTYPE html>
<html lang="en">
<head>
<title>Attachment Opportunities | Q~IA</title>
	<meta charset="utf-8">
	<meta name="Description" content="">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all"/>
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2 user-scalable=no">
</head>

<body>
<!-- header -->
<header>
	<div class="container">
        <div class="header d-lg-flex justify-content-between align-items-center">
            <div class="header-agile">
                <h1>
                    <a style="color: white; font-size: 0.6em" class="navbar-brand logo" href="index.php" title="Q~IA">
                        <img class="responsive" src="favicon/favicon-32x32.png" alt=""/> Q~IA
                    </a>
                </h1>
            </div>
            <div class="nav_w3ls">
                <nav>
                    <label for="drop" class="toggle mt-lg-0 mt-2"><span class="fa fa-bars" aria-hidden="true"></span></label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu">
                        <li class="mr-lg-3 mr-2 active"><a href="index.php">Home</a></li>
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
<!--                        <li class="mr-lg-3 mr-2"><a href="index.php#partners">Partners</a></li>-->
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

<!-- banner -->
<div class="banner_w3lspvt" id="home">
	<div class="container">
		<div class="row banner-tops-style">
			<div class="col-lg-9 style-banner">
				<h3 class="text-wh">Find Attachment Opportunities in Kenya</h3>
				<p class="text-li mt-4">Quickens application of attachment. You only need to create an account, apply for attachment.
				 When an organization accepts you via email. Confirm checkbox <em><b>attached</b></em> on your profile. To indicate you've been attached.</p>
			</div>
		</div>
	</div>
</div>
<!-- //banner -->

<!-- banner bottom -->
<!--<section class="banner_bottom py-sm-5 py-4">-->
<!--	<div class="container py-lg-3">-->
<!--		<div class="row text-center">-->
<!--			<div class="col-md-4 how-icon mt-md-0">-->
<!--				<div class="shadow">-->
<!--					<span class="fa fa-cogs" aria-hidden="true"></span>-->
<!--					<div class=" how-grid">-->
<!--						<h3 class="mt-3">Create Profile </h3>-->
<!--						<p class="mt-3">Create your profile & apply for attachment.</p>-->
<!--						<p>If you're unsuccessful to create, contact the school ILO.</p>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="col-md-4 how-icon1 mt-md-0 mt-4">-->
<!--				<div class="shadow">-->
<!--					<span class="fa fa-search" aria-hidden="true"></span>-->
<!--					<div class="how-grid">-->
<!--						<h3 class="mt-3">Find Attachment </h3>-->
<!--						<p class="mt-3">Apply attachment according to your field of training.</p>-->
<!--						<p>If successful, the organization will reach you through email.</p>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="col-md-4 how-icon2 mt-md-0 mt-4">-->
<!--				<div class="shadow">-->
<!--					<span class="fa fa-institution" aria-hidden="true"></span>-->
<!--					<div class="how-grid">-->
<!--						<h3 class="mt-3">Organizations</h3>-->
<!--						<p class="mt-3">Get the opportunity to train with the best organizations.</p>-->
<!--						<p>Submit <strong>checkbox</strong> on your profile after getting an attachment email.</p>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->
<!-- //banner bottom -->
	
<!-- how it works -->
<section  class="mt-3 mb-5" id="student">
	<div class="container py-md-4">
<!--trying login signup student button-->
<div style="width:100%" class="container">
<h3 style="text-align:center"> Apply for Attachment </h3>
</div>
</div>

<!--end of accordion-->
<br/>
<!--end of login student button-->

<!-- student account accordion-->
<div class="mt-0">
<div class="col-md-12 text-center">
<button onclick="accordionFunction('Demo1')" id="row" class="mr-lg-5 mr-5 ml-lg-5 ml-5 btn btn-aasana-w3 text-uppercase">Student Account</button>
<div id="Demo1" class="w3-hide w3-animate-zoom">
<!--tabs student for login & signup account-->
    <div style="margin-top: 40px">
        <ul class="nav nav-pills nav-justified">
           <li role="presentation" style="font-size:18px; width:55%; text-align: center" class="offset-lg-1 active">
              <a href="#studentlogin" data-toggle="tab"><button class="btn btn-aasana-w3 text-uppercase active">LOGIN</button></a></li>
           <li role="presentation" style="font-size:18px">
              <a href="#studentsignup" data-toggle="tab"><button class="btn btn-aasana-w3 text-uppercase">SIGNUP</button></a></li>
        </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="studentlogin">
           <div>
              <form id="studentlogin-frm" action="validation/student-login-process.php" method="post" class="offset-lg-1 register-wthree w3-animate-zoom">
                  <div class="form-group">
                      <div class="mt-5">
                          <div class="col-md-10">
                               <input class="form-control" type="text" placeholder="Enter Admission Number" name="admno" required="">
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
                      <div class="mt-3">
                          <div class="col-md-10">
                              <button type="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Login</button>
                          </div>
                      </div>
                  </div>
                  <!--display the response returned after form submit-->
                  <div id="student-login" class="text-center col-md-10 student-login-status"></div>
              </form>
           </div>
        </div>
        <div class="tab-pane" id="studentsignup">
            <div>
                <form id="studentregister-frm" action="validation/student-registration-process.php" method="post" class="offset-lg-1 register-wthree w3-animate-zoom">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="mt-5">
                                <div class="col-md-10">
                                    <input class="form-control" type="text" placeholder="Enter Admission Number" name="admno" required="">
                                </div>
                            </div>
                        </div>
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
                                    <input class="form-control" type="text" placeholder="Enter Course" name="course" required="">
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
                            <div class="mt-3">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">SignUp</button>
                                </div
                            </div>
                        </div>
                        <!--display the response returned after form submit-->
                        <div class="text-center col-md-10 student-reg-status"></div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- end of student account -->
<hr />
<!-- org account signup & login -->
<section  class="mt-3" id="org">
	<div class="container py-md-4">
<div style="width:100%" class="container">
<h3 style="text-align:center"> Register Organization</h3>
</div>
</div>

<br/>
<!--end of login student button-->

<!-- Organization account accordion-->
<div class="mt-0">
<div class="col-md-12 text-center">
<button onclick="accordionFunction('Demo2')" id="row" class="mr-lg-5 mr-5 ml-lg-5 ml-5 btn btn-aasana-w3 text-uppercase">Organization Account</button>
	<div id="Demo2" class="w3-hide w3-animate-zoom">
        <div style="margin-top: 40px">
            <ul class="nav nav-pills nav-justified">
                <li role="presentation" style="font-size:18px; width:55%; text-align: center" class="offset-lg-1 active">
                    <a href="#orglogin" data-toggle="tab"><button class="btn btn-aasana-w3 text-uppercase active">LOGIN</button></a></li>
                <li role="presentation" style="font-size:18px">
                    <a href="#orgsignup" data-toggle="tab"><button class="btn btn-aasana-w3 text-uppercase">SIGNUP</button></a></li>
            </ul>
	<div class="tab-content">
        <div class="tab-pane active" id="orglogin">
					<form id="orglogin-frm" action="validation/org-login-process.php" method="post" class=" register-wthree w3-animate-zoom">
						<div class="form-group">
							<div class="mt-5">
								<div class="col-md-10">
									<input class="form-control" type="text" placeholder="Enter Organization Email" name="omail" required="">
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
							<div class="mt-3">
								<div class="col-md-10">
									<button type="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Login</button>
								</div>
							</div>
						</div>
                        <!--display the response returned after form submit-->
                        <div id="org-login" class="text-center col-md-10 org-login-status"></div>
                    </form>
        </div>
     <div class="tab-pane" id="orgsignup">
         <form id="orgregister-frm" action="validation/org-registration-process.php" method="post" class="offset-lg-1 register-wthree w3-animate-zoom">
             <div class="form-group  ">
                 <div class="mt-5">
                     <div class="col-md-10">
                         <input class="form-control" type="text" placeholder="Enter Organization Name" name="oname" required="">
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 <div class="mt-4">
                     <div class="col-md-10 ">
                         <input class="form-control" type="text" placeholder="Enter Organization Email" name="omail" required="">
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 <div class="mt-3">
                     <div class="col-md-10">
                         <input class="form-control" type="text" placeholder="Org Location i.e Gilgil, Kenya" name="location" required="">
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
                 <div class="mt-3">
                     <div class="col-md-10">
                         <button type="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">SIGNUP</button>
                     </div>
                 </div>
             </div>
             <!--display the response returned after form submit-->
             <div class="text-center col-md-10 org-reg-status"></div>
         </form>

  </div>
</div>
</section>
<!-- end of org account-->

<!-- footer -->
<footer class="py-5 mt-5">
	<div class="container py-md-3">
		<div class="row footer-grids">
			<div class="col-md-4">
				<div class="footer-grid left">
				  <h2 style="color: white" class="logo"><a href="index.php" title="Q~IA"><img class="responsive" src="favicon/favicon-32x32.png" alt=""/></a> Q~Industrial Attachment</h2>
				</div>
			</div>
			<div class="col-md-4 middle">
				<p class="btn call"> <span class="fa fa-fire"></span> The No.1 Attachment site.</p>
			</div>
			<div class="col-md-4 right">
				<!-- to top -->
				<div class="top-icon">
					<a href="#home" class="move-top text-center"><span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>To Top</a>
				</div>
				<!-- //to top -->
			</div>
		</div>
		<div class="middle mt-3">
			<p>&copy; <?php echo date("Y");?>. All Rights Reserved.</p>
			<
		</div>
	</div>
</footer>
<!-- //footer -->
<!--function for accordion for both students and organizations-->
<script>
    function accordionFunction(id) {
        const x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="validation/js/jquery.validationEngine.js"></script>
<script src="validation/js/languages/jquery.ValidationEngine.en.js"></script>
<script src="validation/jquery.form.js"></script>
<script src="validation/js/common.js"></script>
<script src="validation/js/register.js"></script>
<script src="validation/js/login.js"></script>
</body>

</html>