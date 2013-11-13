<html>
<body>
<?php
  srand( microtime() * 1000000 );
  $num = rand( 1, 4 );
   
  switch( $num ) 
  {
  case 1: $image_file = "Image 1";
          break;
  case 2: $image_file = "Image 2";
          break;
  case 3: $image_file = "Image 3";
          break;
  case 4: $image_file = "Image 4";
          break;
  }
  echo "Random Image : <div>$image_file<div/>";
?>
</body>
</html>