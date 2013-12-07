<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/24/13
 * Time: 3:30 AM
 * To change this template use File | Settings | File Templates.
 */

class FileLogger
{
    protected $path;
    public $version = '1.0.0';

    public function __construct($path){
        $this->path = $path;
    }

    public function write($message){
        $message = sprintf("%s : %s\n", date('r', 0), $message);
        file_put_contents($this->path, $message, FILE_APPEND);
    }
}