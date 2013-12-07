<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/26/13
 * Time: 1:24 AM
 * To change this template use File | Settings | File Templates.
 */

class DateFormatter
{
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getFormattedDate($timestamp)
    {
        return date($this->config->get('date.format'), $timestamp);
    }
}