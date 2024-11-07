<?php

defined('MOODLE_INTERNAL') || die();

$observers = [
    [
        'eventname' => '\mod_nomedaatividade\event\custom_event',
        'callback' => 'local_costcenter\minhaclasse::meumetodo',
    ],
    [
        'eventname' => '\core\event\course_completed',
        'callback' => 'local_costcenter\minhaclasse::outrometodo',
    ],
    [
        'eventname' => '*',
        'callback' => 'local_costcenter\minhaclasse::catch_all',
        'internal' => false,
    ],
];
