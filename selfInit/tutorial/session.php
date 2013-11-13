<?php
   session_start(); #checks if a session is started if none then start
   if( isset( $_SESSION['counter'] ) )
   {
      $_SESSION['counter'] += 1;
   }
   else
   {
      $_SESSION['counter'] = 1;
   }
   $msg = "You have visited this page ".  $_SESSION['counter'];
   $msg .= "in this session.";
?>
<html>
<head>
<title>Setting up a PHP session</title>
</head>
<body>
<?php  echo ( $msg ); ?>
</body>
</html>

<?php 
   unset($_SESSION['counter']); //destroys one session variable
   session_destroy() //destroys all sessions
?>


<!-- Sessions without Cookies -->
<?php
/*   session_start();

   if (isset($_SESSION['counter'])) {
      $_SESSION['counter'] = 1;
   } else {
      $_SESSION['counter']++;
   }

   $msg = "You have visited this page ".  $_SESSION['counter'];
   $msg .= "in this session.";
   echo ( $msg );*/
?>
<p>
   To continue  click following link <br />
   <a  href="<?php echo htmlspecialchars(SID); ?>">Follow</a>
</p>