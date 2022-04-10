<?php
include "functions/database.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET["op"] == "contact") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $comment = $_POST["message"];
  $ip = $_POST['ip'];
  $sub = "New message";

  $to = $info['email'];
  $subject = $sub;
  $message = ' Message:' . $comment . ' Email:' . $email . ' Name:' . $name . ' IP:' . $ip;
  $headers = 'From: ' . $info['email'] . '' . "\r\n" .
    'Reply-To: ' . $info['email'] . '' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  mail($to, $subject, $message, $headers);
  include "functions/thankyou.php";
  exit();
} else {

?>
  <!DOCTYPE html>
  <html class="full" lang="en">
  <!-- The full page image background will only work if the html has the custom class set to it! Don't delete it! -->

  <?php
  $pageName = "Contact Us";
  include "functions/header.php";
  ?>

  <body>


    <?php
    include "functions/menu.php";
    ?>

    <div class="container">
      <div class="row logo">
        <div class="col-lg-12" style="text-align:center">
          <?php
          include "functions/logo.php";
          include "functions/darkmode.php";
          ?>
        </div>
      </div>
    </div>
    <div class="container  animated fadeIn">
      <div class="row" style="margin-top:20px;">
        <div class="col-md-6 col-md-offset-3">
          <div class="well">
            <form class="form-horizontal" action="contact?op=contact" method="post">
              <fieldset>
                <legend class="">
                  <h2 style="margin:0">Contact us</h2>
                </legend>

                <!-- Name input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="name">Name</label>
                  <div class="col-md-9">
                    <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                  </div>
                </div>

                <!-- Email input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="email">Your E-mail</label>
                  <div class="col-md-9">
                    <input id="email" name="email" type="text" placeholder="Your email" data-validation="email" data-validation-error-msg="Please enter a valid email" class="form-control">
                  </div>
                </div>

                <!-- Message body -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="message">Your message</label>
                  <div class="col-md-9">
                    <textarea class="form-control" id="message" name="message" data-validation="required" data-validation-error-msg="Please enter Message" placeholder="Please enter your message here..." rows="5"></textarea>
                  </div>
                </div>

                <!-- Form actions -->
                <div class="form-group">
                  <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                  </div>
                </div>
              </fieldset>
              <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?> ">
            </form>
          </div>
        </div>
      </div>
    </div>

    </div>


    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.form-validator.min.js"></script>
    <script>
      $.validate({
        modules: 'security'
      });
    </script>

  </body>

  </html>
<?php
}
?>