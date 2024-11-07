<?php

require_once '../../config.php';

$id = required_param('id', PARAM_INT);

require_login(SITEID);

if ($DB->get_record('costcenter', ['id' => $id]) === false) {
    throw new moodle_exception('Invalid Cost Center');
}

$url = new moodle_url('/local/costcenter/edit.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_costcenter'));
$PAGE->set_heading('Editar centro de custo');
$PAGE->set_pagelayout('standard');

$form = new local_costcenter\form\costcenter_form();

if ($formdata = $form->get_data()) {
    // Manipulate formdata
    $record = new \stdClass();
    $record->id = $formdata->id;
    $record->idnumber = $formdata->idnumber;
    $record->name = $formdata->name;
    $record->description = $formdata->description;
    $record->uf = $formdata->uf;
    $record->extra = 'Extra';
    $record->timemodified = time();

    // Save to DB
    $DB->update_record('costcenter', $record);

    // Redirect
    redirect(new moodle_url('/local/costcenter/list_from_template.php'), 'Editado com sucesso', null, \core\output\notification::NOTIFY_SUCCESS);
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
