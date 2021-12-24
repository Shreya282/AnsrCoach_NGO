<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">

    <link rel="stylesheet" type="text/css" href="f_style.css">
    <script type="text/javascript" src="f_script.js"></script>

    <title>Donation Form</title>
  </head>
  <body>

    <!---------------NAVBAR------------------->
      <nav class="topnav">
        <img src="images/logo.jpg" alt="logo" id="logo">
        <div class="tabs">
        <a href="#donation" id="tabs">Donate</a>
        <a href="#contact" id="tabs">Contact</a>
        </div>
      </nav> 
     
    <!------------------QUOTE----------------->
    <section class="quote">
      <p><i>"Giving is just not about making a donation. <br>
      It is about making a difference."</i></p>
    </section> 

    <!----------------IMAGE-------------->
    <section>
      <center><img id="img" src="images/donate.jpg"></center>
    </section>

    <!------------DONATION------------->
      <section class="donation" id="donation">
      <center><form class="dform" method="POST" action="payscript.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter name" required><br><br>
        <label for="contact">Contact no.:</label>
        <input type="text" id="contact" name="contact" placeholder="+91 99999 88888" required><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" placeholder="xyz@example.com" required><br><br>
        <button id="button" type="submit" name="submit" value="submit">SUBMIT</button>
      </form></center>

      <?php

          if(isset($_POST["submit"]) ){
          $name = $_POST['name'];
          $contact = $_POST['contact'];
          $email = $_POST['email'];

          // Database connection
          $conn = new mysqli('localhost','root','','ngo');
          if($conn->connect_error){
              echo "$conn->connect_error";
              die("Connection Failed : ". $conn->connect_error);
          } else {
              $stmt = $conn->prepare("insert into user_details(name, contact, email) values(?, ?, ?)");
              $stmt->bind_param("sis", $name, $contact, $email);
              $execval = $stmt->execute();
              echo $execval;
              echo '<script>alert("Donation Successful!")</script>';
              $stmt->close();
              $conn->close();
          }
        }
        else 
          echo '<script>alert("Donation Failed! Please try agian :(")</script>';
      ?>
      
    <!---------FOOTER----------->
   <footer class="footer" id="contact">
     <div class="footer-container">
      <div class="row">
        <div class="footer-col">
          <h4>OFFICE ADDRESS</h4>
          <ul>
            <li><a>Lorem Ipsum dolor, 234
              1200 Consecteur
              Adipiscing</a></li>
          </ul>
        </div>
        
        <div class="footer-col">
          <h4>CONTACT US</h4>
          <ul>
            <li><a >+123 456 789</a></li>
            <li><a >smile@skype</a></li>
            <li><a >enquiry@smile.com</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>FOLLOW US</h4>
          <div class="social-links">
            <img id="logo-1" src="images/fb.jpg">
            <img id="logo-2" src="images/ig.jpg">
            <img id="logo-2" src="images/twitter-logo.jpg">
          </div>
        </div>
      </div>
     </div>
  </footer>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>