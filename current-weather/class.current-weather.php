<?php

require_once CURRENTWEATHER__PLUGIN_DIR . 'class.current-weather-api.php';

class Markweather {
    public static function plugin_activation() {

    }

    public static function plugin_deactivation() {

    }

    public static function displayweather($atts){
        $api = new Markweather_api();
        $response = $api->get_current_weather($atts['city']);
        $data = json_decode($response);
        return '<p>'.$data->main->temp.'&#176;C, '.ucfirst($data->weather[0]->description).'<p>';
    }
}