<?php

require_once '../../config.php';

$id = optional_param('id', false, PARAM_INT);

require_login(SITEID);

$url = new moodle_url('/local/costcenter/add.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_costcenter'));
$PAGE->set_heading('Adicionar centro de custo');
$PAGE->set_pagelayout('standard');

$form = new local_costcenter\form\costcenter_form();

if ($formdata = $form->get_data()) {
    // Manipulate formdata
    $record = new \stdClass();
    $record->idnumber = $formdata->idnumber;
    $record->name = $formdata->name;
    $record->description = $formdata->description;
    $record->uf = $formdata->uf;
    $record->extra = 'Extra';
    $record->timecreated = time();
    $record->timemodified = time();

    // Save to DB
    $DB->insert_record('costcenter', $record);

    // Redirect
    redirect(new moodle_url('/local/costcenter/list_from_template.php'), 'Adicionado com sucesso');
} else if ($formdata = $form->is_cancelled()) {
    redirect(new moodle_url('/local/costcenter/list_from_template.php'));
}

echo $OUTPUT->header();
$form->display();
if (isset($formdata) && $formdata !== false) {
    echo 'Form data: ';
    var_dump($formdata);
}
echo $OUTPUT->footer();
