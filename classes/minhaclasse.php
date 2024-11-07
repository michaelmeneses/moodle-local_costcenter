<?php

namespace local_costcenter;

defined('MOODLE_INTERNAL') || die();

class minhaclasse
{
    const URL = 'https://webhook.site/ea3169ee-2866-4468-a152-2d04a83ceaad';

    public static function meumetodo(\mod_nomedaatividade\event\custom_event $event)
    {
        $eventdata = $event->get_data();
        $eventdata['course'] = \get_course($event->courseid);
        $eventdata['user'] = \core_user::get_user($event->userid);

        $data = json_encode($eventdata);

        curl_setopt_array($ch = curl_init(), [
            CURLOPT_URL => self::URL,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            ],
            CURLOPT_RETURNTRANSFER => true
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
    }

    public static function catch_all(\core\event\base $event)
    {
        // tratar individualmente cada tipo de evento
    }
}
