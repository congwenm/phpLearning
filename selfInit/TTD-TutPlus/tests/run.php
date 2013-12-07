<?php



//wont work
file_put_contents('php://memory', 'some data');
var_dump(file_get_contents('php://memory'));

//will work, but require to use fopen, fwrite, fseek,fread, and fclose functions
$handle = fopen('php://memory', 'a+');
fwrite($handle, 'some data');
fseek($handle, 0);
var_dump(fread($handle, 1024));
fclose($handle);