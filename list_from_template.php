<?php

require_once '../../config.php';

$uf = optional_param('uf', '', PARAM_TEXT);

require_login(SITEID);

$url = new moodle_url('/local/costcenter/list_from_template.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_costcenter'));
$PAGE->set_heading('Listagem de centro de curso');
$PAGE->set_pagelayout('standard');

$data = [
    ['id' => 1, 'idnumber' => 'CC001', 'name' => 'Marketing', 'description' => 'Centro de custo para o departamento de Marketing', 'uf' => 'SP'],
    ['id' => 2, 'idnumber' => 'CC002', 'name' => 'Vendas', 'description' => 'Centro de custo para o departamento de Vendas', 'uf' => 'RJ']
];

$params = [];
if (!empty($uf)) {
    $params['uf'] = $uf;
}

$records = $DB->get_records('costcenter', $params);

$name = '%Financeiro%';
$records = $DB->get_records_select(
    'costcenter',
    'uf = :uf AND name LIKE :name',
    ['uf' => $uf, 'name' => $name],
    'id DESC'
);

$data = [];
foreach ($records as $record) {
    $record->editurl = html_writer::link(
        new moodle_url('/local/costcenter/edit.php', ['id' => $record->id]),
        'Editar');

    $data[] = $record;
}

// Tabela com Output API
$add_button = html_writer::link(
    new moodle_url('/local/costcenter/add.php'),
    'Adicionar centro de custo',
    ['class' => 'btn btn-primary mb-3']
);

$alert = '';
if (rand(0,1)) {
    $alert = 'Meu alerta de informação!';
}

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_costcenter/list', [
    'add_button' => $add_button,
    'data' => $data,
    'url' => $PAGE->url,
    'alert' => $alert
]);
echo $OUTPUT->footer();
