<?php

$functions = [
    'local_costcenter_get_costcenter' => [
        'classname' => 'local_costcenter\external\costcenter_external',
        'methodname' => 'get_costcenter',
        'classpath' => 'local/costcenter/classes/external/costcenter_external.php',
        'description' => 'Retorna todos os centros de custos.',
        'type' => 'read',
        'capabilities' => 'local/costcenter:viewall'
    ],
    'local_costcenter_get_users_by_costcenter' => [
        'classname' => 'local_costcenter\external\costcenter_external',
        'methodname' => 'get_users_by_costcenter',
        'classpath' => 'local/costcenter/classes/external/costcenter_external.php',
        'description' => 'Retorna os usuários vinculados a um centro de custo específico.',
        'type' => 'read',
        'capabilities' => 'local/costcenter:view'
    ]
];

$services = [
    'Webservice Cost Center'  => [
        'functions' => [
            'core_enrol_get_enrolled_users',
            'enrol_manual_enrol_users',
            'local_costcenter_get_costcenter',
            'local_costcenter_get_users_by_costcenter',
        ],
        'enabled' => 0,
        'restrictedusers' => 0,
        'shortname' => 'webservice_costcenter',
        'downloadfiles' => 1,
        'uploadfiles' => 1
    ],
];
