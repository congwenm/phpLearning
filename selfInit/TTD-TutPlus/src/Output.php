<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/24/13
 * Time: 2:26 AM
 * To change this template use File | Settings | File Templates.
 */
class Output
{
    const VERSION = '0.0.1';

    public function printVersion(){
        print 'Version is ' . self::VERSION;
    }
}

//$c = new Output;
//$c->printVersion();