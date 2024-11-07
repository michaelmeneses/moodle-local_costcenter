<?php

defined('MOODLE_INTERNAL') || die();

$tasks = [
    [
        'classname' => '\local_costcenter\task\minha_tarefa_cron',
        'blocking' => 0,
        'minute' => 'R',
        'hour' => 'R',
        'day' => '*',
        'month' => '*',
        'dayofweek' => 'R'
    ]
];
