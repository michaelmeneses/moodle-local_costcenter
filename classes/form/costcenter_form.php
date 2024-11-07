<?php

namespace local_costcenter\form;

require_once("$CFG->libdir/formslib.php");

class costcenter_form extends \moodleform
{
    public function definition()
    {
        global $DB;

        $mform = $this->_form;

        $id = optional_param('id', false, PARAM_INT);
        if (is_numeric($id)) {
            $record = $DB->get_record('costcenter', ['id' => $id]);

            $mform->addElement('hidden', 'id', null);
            $mform->setType('id', PARAM_INT);
            $mform->setDefault('id', 0);
        }

        $mform->addElement('text', 'idnumber', get_string('idnumber'));
        $mform->setType('idnumber', PARAM_NOTAGS);
        $mform->addRule('idnumber', get_string('required'), 'required', null, 'client');

        $mform->addElement('text', 'name', get_string('name'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', 'Mínimo 3 caracteres', 'minlength', 3, 'client');

        $mform->addElement('textarea', 'description', get_string('description'));

        $options = [
            'SP' => 'São Paulo',
            'RJ' => 'Rio de Janeiro',
            'NA' => 'Nacional'
        ];
        $mform->addElement('select', 'uf', get_string('uf', 'local_costcenter'), $options);

        $this->add_action_buttons();

        if (isset($record)) {
            $this->set_data($record);
        }
    }

    public function validation($data, $files)
    {
        $errors = parent::validation($data, $files);

        if (empty($data['description'])) {
            $errors['description'] = 'Preencha a descrição';
        }

        return $errors;
    }
}
