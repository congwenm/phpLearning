<?php
	// include() include all text in a file here and execute the file if wrong generate error but execution continues
	// require() does same thing except halt execution on error if file error occurs.
	// include("array.php");
	// fopen('filename', 'mode') open a file

	$filename = "fileIO.txt";

	/*Read*/
	$file = fopen($filename, "r");
	if ($file == false){
		echo("Error in opening file");
		exit();
	}
	$filesize = filesize($filename);
	$filetext = fread($file, $filesize);

	fclose($file);

	echo ("File size : $filesize bytes");
	echo ("<pre>$filetext</pre>");


	
	/*Write*/
	$filename = "fileOut.txt";
	$file = fopen( $filename, "w" );
	if( $file == false )
	{
	   echo ( "Error in opening new file" );
	   exit();
	}
	fwrite( $file, "This is  a simple test\n" );
	fclose( $file );
	

	
	if( file_exists( $filename ) )
	{
	   $filesize = filesize( $filename );
	   $msg = "File  created with name $filename ";
	   $msg .= "containing $filesize bytes";
	   echo ($msg );
	}
	else
	{
	   echo ("File $filename does not exit" );
	}
	
?>
