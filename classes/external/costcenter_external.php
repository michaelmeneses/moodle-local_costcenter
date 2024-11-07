<?php

namespace local_costcenter\external;

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/externallib.php");

class costcenter_external extends \external_api
{
    public static function get_costcenter_parameters()
    {
        return new \external_function_parameters([]);
    }

    public static function get_costcenter()
    {
        global $DB;

        $records = $DB->get_records('costcenter', []);

        $data = [];
        foreach ($records as $record) {
            unset($record->uf);
            $data[] = $record;
        }

        return $data;
    }

    public static function get_costcenter_returns()
    {
        return new \external_multiple_structure(
            new \external_single_structure([
                'id' => new \external_value(PARAM_INT, 'ID do centro de custo'),
                'name' => new \external_value(PARAM_TEXT, 'Nome do centro de custo'),
                'uf' => new \external_value(PARAM_TEXT, 'UF do centro de custo', VALUE_OPTIONAL)
            ])
        );
    }

    public static function get_users_by_costcenter_parameters()
    {
        return new \external_function_parameters([
            'costcenterid' => new \external_value(PARAM_INT, 'ID do centro de custo', VALUE_DEFAULT, 0),
            'idnumber' => new \external_value(PARAM_ALPHANUMEXT, 'Identificador do centro de custo', VALUE_DEFAULT, '')
        ]);
    }

    public static function get_users_by_costcenter()
    {

    }

    public static function get_users_by_costcenter_returns()
    {

    }
}
