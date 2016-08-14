<?php
   // define variables and set to empty values
   $nameErr = $collegeErr = $dateOfWorkshopErr = $collegeWhereErr = $contactErr = $emailErr  =  $rateErr = "";
   $name = $college  = $dateOfWorkshop = $collegeWhere = $contact = $email =  $comment = $rate = "";

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $flag = 1;
     if (empty($_POST["name"])) {
       $nameErr = "<br><br>Name is required";
          $flag = 0;
     } else {
       $name = test_input($_POST["name"]);
       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
         $nameErr = "<br><br>Only letters and white space allowed";
         $flag = 0;
       }

     }

     if (empty($_POST["college"])) {
       $collegeErr = "<br><br>College is required";
       $flag = 0;
     } else {
       $college = test_input($_POST["college"]);
       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-zA-Z ]*$/",$college)) {
         $collegeErr = "<br><br>Only letters and white space allowed";
         $flag = 0;
       }

     }

     if (empty($_POST["dateOfWorkshop"])) {
       $dateOfWorkshopErr = "<br><br>Date Of Workshop is required";
       $flag = 0;
     } else {
       $dateOfWorkshop = test_input($_POST["dateOfWorkshop"]);
       // check if name only contains letters and whitespace
     }

     if (empty($_POST["collegeWhere"])) {
       $collegeWhereErr = "<br><br>College Where Workshop Was Conducted is required";
       $flag = 0;
     } else {
       $collegeWhere = test_input($_POST["collegeWhere"]);
       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-zA-Z0-9 ]*$/",$collegeWhere)) {
         $collegeWhereErr = "<br><br>Only letters and white space allowed";
         $flag = 0;
       }

     }

     if (empty($_POST["contact"])) {
       $contactErr = "<br><br>Contact Number is required";
       $flag = 0;
     } else {
       $contact = test_input($_POST["contact"]);

     }

     if (empty($_POST["email"])) {
       $emailErr = "<br><br>Email is required";
       $flag = 0;
     } else {
       $email = test_input($_POST["email"]);
       // check if e-mail address is well-formed
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $emailErr = "<br><br>Invalid email format";
         $flag = 0;
       }

     }


     if (empty($_POST["comment"])) {
       $comment = "";
     } else {
       $comment = test_input($_POST["comment"]);
     }

     if (empty($_POST["rate"])) {
       $rateErr = "<br><br>Rating is required";
       $flag = 0;
     } else {
       $rate = test_input($_POST["rate"]);
     }
     if($flag==1){
       $to = "harsh@elan.org.in";
       $subject = "HTML email";

       $message = "
       <html>
       <head>
       <title>Elan Workshop Feedback Form</title>
       </head>
       <body>
       <p>Elan Workshop Feedback Form</p>
       <table>
       <tr>
       <th><strong>Name</strong></th>
       <th>$name</th>
       </tr>

       <tr>
       <th><strong>College</strong></th>
       <th>$college</th>
       </tr>

       <tr>
       <th><strong>Date Of Workshop(dd-mm-yyyy)</strong></th>
       <th>$dateOfWorkshop</th>
       </tr>

       <tr>
       <th><strong>College Where Workshop Was Conducted</strong></th>
       <th>$collegeWhere</th>
       </tr>

       <tr>
       <th><strong>Contact Number</strong></th>
       <th>$contact</th>
       </tr>

       <tr>
       <th><strong>Topic</strong></th>
       <th>Entrench Electronics Workshop </th>
       </tr>

       <tr>
       <th><strong>Email</strong></th>
       <th>$email</th>
       </tr>


       <tr>
       <th><strong>Comment</strong></th>
       <th>$comment</th>
       </tr>

       <tr>
       <th><strong>Rate</strong></th>
       <th>$rate</th>
       </tr>

       </table>
       </body>
       </html>
       ";

       // Always set content-type when sending HTML email

       $headers = "From: harsh@elan.org.in \r\n";
$headers .= "Reply-To: harshaga97@gmail.com \r\n";
 $headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $answer="";
       if (mail($to,$subject,$message,$headers))
       $answer =  '<div class="alert alert-warning">
         <strong>
         Thank You For Your Valuable Feedback.
         <br><br>
         <a href="./" style="color: #916D3B;" >Go Back To Home Page</a>
         </strong>
       </div>';
       else
       $answer = '<div class="alert alert-danger">
         <strong>
         Some Error Occured While Sending Feedback.
         <br><br>
         <a href="./" style="color: #916D3B;" >Go Back To Home Page</a>
         </strong>
       </div>';

     }
   }

   function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }
   ?>
<!DOCTYPE HTML>
<html>
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
      <link rel='shortcut icon' href='assets/img/favicon.ico' type='image/x-icon'/ >
      <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="assets/css/jquery-ui.css" media="screen" title="no title" charset="utf-8">
      <link rel="stylesheet" href="assets/css/feedback.css">
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <title>Feedback Entrench Electronics Workshop</title>
   </head>
   <body style="background-image:url('assets/img/bg/gplay.png')">
     <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<nav id=myNavbar class="navbar navbar-inverse navbar-fixed-top" role=navigation>
   <div class=container>
      <div class=navbar-header>
        <button type=button class=navbar-toggle data-toggle=collapse data-target=#navbarCollapse>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
        <a href=./  class="navbar-brand smoothScroll"  >ELAN 2017</a>
      </div>
      <div class="collapse navbar-collapse" id=navbarCollapse>
         <ul class="nav navbar-nav">
             <li><a href=./#about class=smoothScroll>About</a></li>
             <li><a href=./#Portfolio class=smoothScroll> Events</a></li>
            <li><a href=./#workshop class=smoothScroll>Workshops</a></li>
            <li><a href=./#blog class=smoothScroll>Glimpses</a></li>
            <!-- <li><a href=team.html target=_blank> Team</a></li> -->
            <li><a href=Sponsors.html target=_self>Previous Sponsors</a></li>
            <li><a href=campusAmbassador.html target=_self>Campus Ambassador</a></li>
            <li class='dropdown active'>
               <a class=dropdown-toggle data-toggle=dropdown href=#>Feedback<span class=caret></span></a>
               <ul class=dropdown-menu>
                  <li><a href=feedbackElan.php target=_self>Elan Workshop</a></li>
                  <li><a href=feedbackAzure.php target=_self>Azure Skynet Workshop</a></li>
                  <li  class="active"><a href=feedbackEntrench.php target=_self>Entrench Electronics Workshop</a></li>
               </ul>
            </li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
           <li><a href="team.html"><span class="glyphicon glyphicon-user"></span> Contact Us</a></li>
          </ul>
      </div>
   </div>
</nav>
      <nav class="navbar navbar-default ">
      </nav>
      <br>
      <table class="table" width="300">
         <tbody>
            <tr>
               <td style="border:none;" width="100">&nbsp;</td>
               <td style="border:none;"  width="100">
                  <div class="container container-table">
                     <div class="row vertical-center-row">
                        <div class="text-center col-md-6 col-md-offset-3">
                           <h1 id="title" >Entrench Electronics Workshop Feedback Form</h1>
                        </div>
                        <!-- style="margin-left:21%;" -->
                     </div>
                  </div>
               </td>
               <td style="border:none;" width="100">&nbsp;</td>
            </tr>
            <tr>
               <td style="border:none;" width="100">&nbsp;</td>
               <td style="border:none;"  width="100">
                  <div class="container container-table">
                  <div class="row vertical-center-row">
                  <div class="text-center col-md-7 col-md-offset-2" id="data">
                  <h2 id="title2">Please Give Your Valuable FeedBack</h2>
                  <hr>
                  <p><span class="error"></span></p>
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" name="feedback">
                     <label class="control-label" for="usr">Name:</label>
                     <div class="input-group">
                        <input type="text" class="form-control" id="usr" name="name" value="<?php echo $name; ?>" required>
                        <span class="input-group-addon" ><span class="glyphicon glyphicon-user"></span></span>
                     </div>
                     <span class="error"> <?php echo $nameErr;?></span>
                     <br><br>
                     <label class="control-label" for="usr">College:</label>
                     <div class="input-group">
                        <input type="text" class="form-control" id="usr" name="college" value="<?php echo $college; ?>" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></span>
                     </div>
                     <span class="error"> <?php echo $collegeErr;?></span>
                     <br><br>
                     <label class="control-label" for="usr">Date Of Workshop:</label>
                     <div class="input-group">
                        <input type="text" class="form-control" id="datepicker" name="dateOfWorkshop" value="<?php echo $dateOfWorkshop; ?>" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                     </div>
                     <span class="error" > <?php echo $dateOfWorkshopErr;?></span>
                     <br><br>
                     <label class="control-label" for="usr">College Where Workshop Was Conducted:</label>
                     <div class="input-group">
                        <input type="text" class="form-control" id="usr" name="collegeWhere" value="<?php echo $collegeWhere; ?>" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                     </div>
                     <span class="error" > <?php echo $collegeWhereErr;?></span>
                     <br>
                     <label class="control-label" for="usr">Contact No.:</label>
                     <div class="input-group">
                        <input type="number" class="form-control" id="usr" name="contact" value="<?php echo $contact; ?>" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
                     </div>
                     <span class="error"> <?php echo $contactErr;?></span>
                     <br><br>
                     <label class="control-label" for="usr">E-mail:</label>
                     <div class="input-group">
                        <input type="email" class="form-control" id="usr" name="email" value="<?php echo $email; ?>" required >
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                     </div>
                     <span class="error"> <?php echo $emailErr;?></span>
                     <br><br>
                     <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment" cols="40"><?php echo $comment;?></textarea>
                     </div>
                     <br><br>
                     <div class="form-group">
                        <label for="sel1">Rate Out Of 10:</label>
                        <select class="form-control" id="sel1" name="rate" >
                           <option value="10">10</option>
                           <option value="9">9</option>
                           <option value="8">8</option>
                           <option value="7">7</option>
                           <option value="6">6</option>
                           <option value="5">5</option>
                           <option value="4">4</option>
                           <option value="3">3</option>
                           <option value="2">2</option>
                           <option value="1">1</option>
                        </select>
                     </div>
                     <br><br><br>
                     <a href="" onclick="document.feedback.submit();return false;">
                        <div class="button-fill orange">
                           <div class="button-text">submit</div>
                           <div class="button-inside">
                              <div class="inside-text">submit</div>
                           </div>
                        </div>
                     </a>
                     <!-- </button>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSft2xODbmH5AeVDJz6mMlUId1XMU0s7L68hI1ue0a6FkWfNrA/viewform" target="_blank">

                                 </a> -->
                     <!-- <div class="container container-table">
                        <div class="row vertical-center-row">
                          <div class="text-center col-md-8 col-md-offset-1" style="margin-left:13%;">
                            <input type="submit" name="submit" value="Submit" class="btn btn-warning col-sm-3">
                            </div>
                        </div>
                        </div> -->
                  </form>
                  <br><br>
                  <?php
                     echo $answer;
                     ?>
               </td>
               <td style="border:none;" width="100">&nbsp;</td>
            </tr>
         </tbody>
      </table>
      <br>
      <div id=footerwrap1>
         <div class=container>
            <span class=col-sm-4>
              <a href="hapticsroboarm" target="_blank">
                <button type="button" class="btn btn-danger btn-sm" style="float:left;margin-top:3px;font-size: 13px;font-weight: bold;">HAPTICS ROBOARM WORKSHOP</button>
              </a>
             </span>
            <span class=col-sm-4>
               <h4 id="footerwrap1Heading">Created by <a href="./">Elan</a> - Copyright 2017</h4>
            </span>
            <span class="col-sm-4" id=socialLinks>
            <a href=https://twitter.com/ELAN_IITH target=_blank><i class="fa fa-twitter"></i></a>
            &nbsp;&nbsp;&nbsp;
             <a href=https://www.facebook.com/elan.iithyderabad/?fref=ts target=_blank><i class="fa fa-facebook"></i></a>
             &nbsp;&nbsp;&nbsp;
 <!--
<div class="fb-like" data-href="https://www.facebook.com/elan.iithyderabad/?fref=ts" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
-->

<button type="button" id="faceBookLike" class="btn btn-primary btn-xs" name="button">Like</button>
<div class="Fbpage">
  <iframe style="border: none; overflow: hidden; width: 100%; height: 600px; background: white; float: left;" src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/elan.iithyderabad/?fref=ts;width=300&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=true&amp;header=true&amp;height=600" width="300" height="150" frameborder="0" scrolling="yes"></iframe>
</div>
<!-- <div class="fb-like" data-href="https://www.facebook.com/elan.iithyderabad/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div> -->
&nbsp;&nbsp;&nbsp;
 <a href=https://www.youtube.com/user/ElanIITHyderabad target=_blank><i class="fa fa-youtube-play"></i></a>

            </span>
         </div>
      </div>
   </body>
   <script type="text/javascript" src="assets/js/jquery.1.8.3.min.js"></script>
   <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/js/jquery-ui.js">  </script>
   <script>
      $(function() {
        $( "#datepicker" ).datepicker({
              dateFormat: 'dd-mm-yy'
            });
            $(".button-fill").hover(function() {
              $(this).children(".button-inside").addClass('full');
            }, function() {
              $(this).children(".button-inside").removeClass('full');
            });
            $("#sel1").val('<?php echo $rate; ?>');
      });
   </script>
</html>
