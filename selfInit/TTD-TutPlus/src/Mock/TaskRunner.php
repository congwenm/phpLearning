<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/24/13
 * Time: 7:18 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'TaskInterface.php';

class TaskRunner
{
    protected  $tasks = array();

    public function registerTask(TaskInterface $task)
    {
        $this->tasks[] = $task;
    }

    public function runAll($options)
    {
        foreach($this->tasks as $index => $task)
        {
            $task->execute($options, $index);
        }

//        $this->tasks[0]->execute($options);
    }
    //another methods, like unregister, getTask etc.

}