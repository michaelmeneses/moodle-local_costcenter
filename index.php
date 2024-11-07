<?php

require_once '../../config.php';

require_login(SITEID);

//require_capability('local/costcenter:viewall', \context_system::instance());

$content = '';
if (!has_capability('local/costcenter:viewall', \context_system::instance())) {
    $content = 'Você não possui a permissão necessária para acessar essa página.';
    //throw new required_capability_exception(\context_system::instance(), 'local/costcenter:view', 'nopermissions', '');
}

if (is_siteadmin()) {
    $content = 'Você é um super administrador.';
}

echo $OUTPUT->header();
echo $content;
echo '<br>';
echo 'Hello World!';
echo $OUTPUT->footer();
