<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email = "";
  }
  $message = $_POST['message'];
  $website = $_POST['website'];
  if ($website == "cb") {
    if (!empty($name) && !empty($email) && !empty($message)) {
      $to = "wgajew@yola.pl";
      $subject = "comicbubbles.com";
      $txt = $message;
      $headers = 'From: ' . $name . ' <' . $email . ">\r\n" . 'Reply-To: ' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
      if (mail($to,$subject,$txt,$headers)) $_SESSION['email_sent'] = 1;
    }
    else {
      $_SESSION['name'] = $name;
      $_SESSION['email'] = $email;
      $_SESSION['message'] = $message;
    }
  }
  header('location: ./contact');
}
else {
?>
<!doctype html>
<html lang="en">
<head>
<?php
	include 'header.php';
?>
<script>
function cb(){
	<?php include 'cb_is.php'; ?>
}
</script>
</head>
<body class="contact" onload="cb()">
<?php
	$page = "contact";
	include 'menu.php';
  $name_error = 0;
  $email_error = 0;
  $message_error = 0;
  $n = null;
  $e = null;
  $m = null;
  if (isset($_SESSION['email_sent'])) {
    echo '<h3>Thank you for your message</h3>';
  }
  else {
    if (isset($_SESSION['name'])) {
      if (empty($_SESSION['name'])) {
        $name_error = 1;
      }
      else {
        $n = $_SESSION['name'];
      }
    }
    if (isset($_SESSION['email'])) {
      if (empty($_SESSION['email'])) {
        $email_error = 1;
      }
      else {
        $e = $_SESSION['email'];
      }
    }
    if (isset($_SESSION['message'])) {
      if (empty($_SESSION['message'])) {
        $message_error = 1;
      }
      else {
        $m = $_SESSION['message'];
      }
    }
  }
  session_unset();
  session_destroy();
?>
<form action="contact" method="post">
  Name<span>*</span><br>
  <input type="text" name="name" placeholder="your name"<?php if (!empty($name_error)) echo' class="red"'; if($n) echo' value="'.$n.'"';?>>
  <br>
  Email<span>*</span><br>
  <input type="text" name="email" placeholder="your email"<?php if (!empty($email_error)) echo' class="red"'; if($e) echo' value="'.$e.'"';?>>
  <br>
  <input type="text" name="website" value="cb" autocomplete="off">
  Message<span>*</span><br>
  <textarea name="message" placeholder="your message"<?php if (!empty($message_error)) echo' class="red"'; ?>><?php if($m) echo $m; ?></textarea>
  <br>
  <input type="submit" name="send" value="Send Email">
</form>
<?php include 'footer.php'; ?>
</body>
</html>
<?php
}
?>
