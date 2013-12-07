<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/24/13
 * Time: 7:20 PM
 * To change this template use File | Settings | File Templates.
 */

interface TaskInterface
{
    public function execute(array $options, $order);
}