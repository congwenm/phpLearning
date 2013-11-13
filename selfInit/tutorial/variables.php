<?php
	# local variable
	$x = 4;
	function getX(){
		$x = 0;
		print "\$x inside function is $x"; //$x inside function is 0.
	}
	getX();
	print "<br/>\$x outside of function is $x"; //$x outside of function is 4.
?>

<?php
	# function variable (parameter)
	// multiply a value by 10 and return it to the caller
	function multiply ($value) {
	    $value = $value * 10;
	    return $value;
	}
	$retval = multiply (10);
	Print "<br/>Return value is $retval\n";
?>

<?php
	# Static variable
	echo "<br/>Static: ";
	function keep_track() {
	   STATIC $count = 0;
	   $count++;
	   print $count;
	   print "
	";
	}
	keep_track();
	keep_track();
	keep_track();
?>

<?php
	# Global variable
	echo "<br/>Global: ";
	$somevar = 15;
	function addit() {
		GLOBAL $somevar;
		$somevar++;
		print "Somevar is $somevar";
	}
	addit();
?>
<?php
	# Constants 
	# Only scalar data (boolean, integer, float and string) can be contained in constants.
	echo"<br/>Constants: ";
	define("MINSIZE", 50);

	echo MINSIZE; //50
	echo "<br/>";
	echo constant("MINSIZE");//50

/*	
 * 	Magic constants
 *
	Name	Description
	__LINE__		The current line number of the file.
	__FILE__		The full path and filename of the file. If used inside an include,the name of the included file is returned. Since PHP 4.0.2, __FILE__ always contains an absolute path whereas in older versions it contained relative path under some circumstances.
	__FUNCTION__	The function name. (Added in PHP 4.3.0) As of PHP 5 this constant returns the function name as it was declared (case-sensitive). In PHP 4 its value is always lowercased.
	__CLASS__		The class name. (Added in PHP 4.3.0) As of PHP 5 this constant returns the class name as it was declared (case-sensitive). In PHP 4 its value is always lowercased.
	__METHOD__	 	The class method name. (Added in PHP 5.0.0) The method name is returned as it was declared (case-sensitive).
 */
?>

<?php
	echo "<br/>Strings: ";
	/*
		"" 			interpolates for variable
		'' 			simple string
		strlen() 	gets length 
		strpos()	gets position of $c in $str in ($str, $c);
	*/
?>