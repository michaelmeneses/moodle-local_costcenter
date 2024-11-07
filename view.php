<?php

require_once '../../config.php';

require_login(SITEID);

$url = new moodle_url('/local/costcenter/view.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_costcenter'));
$PAGE->set_heading('Meu título da página');
$PAGE->set_pagelayout('standard');
$PAGE->navbar->add(get_string('costcenter', 'local_costcenter'));
$PAGE->navbar->add('Novo item');

echo $OUTPUT->header();
echo '<strong>';
echo get_string('course');
echo ': </strong>';
echo 'Hello World!';
echo '<br>';
echo '<strong>';
echo get_string('pluginname', 'forum');
echo ': </strong>';
echo 'Nome do fórum';
echo '<br>';
echo '<strong>';
echo get_string('pluginname', 'report_log');
echo ': </strong>';
echo '?';
echo $OUTPUT->footer();
