<?php

namespace local_costcenter\task;

use local_costcenter\util;

defined('MOODLE_INTERNAL') || die();

class minha_tarefa_cron extends \core\task\scheduled_task
{
    const URL = 'https://webhook.site/ea3169ee-2866-4468-a152-2d04a83ceaad';

    public function get_name()
    {
        return get_string('minha_tarefa_cron', 'local_costcenter');
    }

    public function execute()
    {
        $userid = rand(3, 100);
        $user = \core_user::get_user($userid);

        $response = new \stdClass();
        $response->success = (bool)rand(0, 1);
        $response->time = time();
        $response->user = $user;
        $response->admin = get_admin();

        self::outro_metodo($response);
    }

    protected static function outro_metodo($data)
    {
        return util::request(self::URL, json_encode($data));
    }
}
