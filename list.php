<?php

require_once '../../config.php';

require_login(SITEID);

$url = new moodle_url('/local/costcenter/add.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_costcenter'));
$PAGE->set_heading('Listagem de centro de curso');
$PAGE->set_pagelayout('standard');

$data = [
    ['id' => 1, 'idnumber' => 'CC001', 'name' => 'Marketing', 'description' => 'Centro de custo para o departamento de Marketing', 'uf' => 'SP'],
    ['id' => 2, 'idnumber' => 'CC002', 'name' => 'Vendas', 'description' => 'Centro de custo para o departamento de Vendas', 'uf' => 'RJ']
];

echo $OUTPUT->header();

// Tabela com Output API
echo html_writer::link(
    new moodle_url('/local/costcenter/add.php'),
    'Adicionar centro de custo',
    ['class' => 'btn btn-primary mb-3']
);

echo html_writer::start_tag('table', ['class' => 'generaltable']);
echo html_writer::start_tag('tr');
echo html_writer::tag('th', 'ID') . html_writer::tag('th', 'ID Number') . html_writer::tag('th', 'Nome') . html_writer::tag('th', 'UF');
echo html_writer::end_tag('tr');
foreach ($data as $row) {
    echo html_writer::start_tag('tr');
    echo html_writer::tag('td', $row['id']);
    echo html_writer::tag('td', $row['idnumber']);
    echo html_writer::tag('td', $row['name']);
    echo html_writer::tag('td', $row['uf']);
    echo html_writer::end_tag('tr');
}
echo html_writer::end_tag('table');

echo $OUTPUT->footer();
