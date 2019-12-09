<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recruitment</title>
        <link rel="shortcut icon" type="image/png" href="images/ibis-logo-solid-black.png"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="nav.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/80bb8e0015.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" type="text/css" href="recruitment-1.css">
        <link rel="stylesheet" type="text/css" href="recruitment-contact.css">
    </head>
    <body>
        <main>
            <div class="header">
              <center>
                  <h2>Recruitment Contact Form</h2>
              </center>
              <?php
                if(isset($_POST['submit'])){
                  $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
                  $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
                  $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
                  $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
                  if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
                    $name_error = 'Invalid name';
                  }
                  if(!preg_match("/^[A-Za-z .'-]+$/", $subject)){
                    $subject_error = 'Invalid subject';
                  }
                  if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
                    $email_error = 'Invalid email';
                  }
                  if(strlen($message) === 0){
                    $message_error = 'Please fill in the Message box';
                  }
                }
              ?>
          <div class="form-holder">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <label for="name">Name:</label><br>
              <input type="text" name="name" placeholder="First and Last name">
              <p class="error"><?php if(isset($name_error)) echo $name_error; ?></p>
              <label for="subject">Subject:</label><br>
              <input type="text" name="subject" placeholder="I would like to register my child">
              <p class="error"><?php if(isset($subject_error)) echo $subject_error; ?></p>
              <label for="email">Email:</label><br>
              <input type="text" name="email" placeholder="name@example.com">
              <p class="error"><?php if(isset($email_error)) echo $email_error; ?></p>
              <label for="message">Message:</label><br>
              <textarea name="message" placeholder="Please type your message here"></textarea>
              <p class="error"><?php if(isset($message_error)) echo $message_error; ?></p>
              <input type="submit" name="submit" value="Submit">
                    <!-- this is the script that will send the above to the target. please edit the target $to = 'target@ibis.org' below -->
                <?php 
                  if(isset($_POST['submit']) && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
                    $to = 'target@ibis.org'; // edit here
                    $body = " Name: $name\n E-mail: $email\n Message:\n $message";
                    if(mail($to, $subject, $body)){
                      echo '<p class="verify">Your message is sent. We will contact you shortly</p>';
                    }else{
                      echo '<p class="error">Error occurred, please try again later</p>';
                    }
                  }
                ?>
              </form>
            </div>

            <div class="background">
                <div class="site-container">
                    <img class="umn" src="images/umn-navy.png">
                    <h4>Minnesota</h4>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>University of Minnesota
                    </br>
                    <i class="far fa-envelope"></i><a href="mailto:ibis@umn.edu">ibis@umn.edu</a>
                </div>
                <div class="site-container">
                    <img class="phi" src="images/phi-navy.png">
                    <h4>Philadelphia</h4>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>Children's Hospital of Philadelphia
                    </br>
                    <i class="far fa-envelope"></i><a href="mailto:IBIS@email.chop.edu">IBIS@email.chop.edu</a>
                </div>
                <div class="site-container">
                    <img class="sea" src="images/sea-navy.png">
                    <h4>Seattle</h4>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>University of Washington
                    </br>
                    <i class="far fa-envelope"></i><a href="mailto:mwendt11@uw.edu">mwendt11@uw.edu</a>
                </div>
                <div class="site-container">
                    <img class="stl" src="images/stl-navy.png">
                    <h4>St. Louis</h4>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>Washington University School of Medicine
                    </br>
                    <i class="far fa-envelope"></i><a href="mailto:ibis@wustl.edu">ibis@wustl.edu</a>
                </div>
                <div class="site-container">
                    <img class="unc" src="images/unc-navy.png">
                    <h4>Chapel Hill</h4>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>University of North Carolina
                    </br>
                    <i class="far fa-envelope"></i><a href="mailto:ibis@wustl.edu">ibisnetwork@cidd.unc.edu</a>
                </div>

            </div>
            <footer>
                <div>
                    <div id="footer-main">
                        <div class="flex-container-4">
                            <div style="flex: 1">
                                <img src="images/ibis-logo-white-outline-transparent.png" style="width:90px;">
                            </div>
                            <div class="col" style="flex: 3">
                                <p>This study is funded by the NIH as an Autism Center of Excellence under the “Longitudinal MRI Study of Infants at Risk for Autism”</p>
                                <p>Grant Number: R01HD055741</p>
                            </div>
                        </div>
                    </div>
                    <div id="footer-bottom">
                        <p>&copy; 2019 IBIS Network</p>
                    </div>
                </div>
            </footer>
        </main>
    </body>
</html>