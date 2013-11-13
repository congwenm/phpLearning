<?php
	#!/usr/bin/perl

	$file = "./form.php";

	# HTTP Header
	print "Content-Type:application/octet-stream; name=\"form.php\"\r\n";
	print "Content-Disposition: attachment; filename=\"form.php\"\r\n\n";

	# Actual File Content
	
	fopen( $file, "<FileName" );
	while(fread($file, $buffer, 100) )
	{
	   print("$buffer");
	}



?>